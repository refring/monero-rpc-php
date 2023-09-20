<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp;

use Http\Discovery\Psr17Factory;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use RefRing\MoneroRpcPhp\Enum\ErrorCode;
use RefRing\MoneroRpcPhp\Exception\MoneroRpcException;
use RefRing\MoneroRpcPhp\Http\DigestAuthentication;
use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use RefRing\MoneroRpcPhp\Request\RpcRequest;

abstract class JsonRpcClient
{
    public const DEFAULT_ENDPOINT_PATH = '/json_rpc';

    /**
     * The HTTP headers for the requests.
     *
     * @var array<string, string>
     */
    private array $headers = [];

    private string $username = '';

    private string $password = '';

    protected string $endPointPath = self::DEFAULT_ENDPOINT_PATH;

    public function __construct(private readonly ClientInterface $httpClient, private readonly string $url)
    {

    }

    public function createRequest(string $json): RequestInterface
    {
        $psr17Factory = new Psr17Factory();

        $body = $psr17Factory->createStream($json);

        $request = $psr17Factory->createRequest('POST', $this->url);

        if ($request->getUri()->getPath() !== $this->endPointPath) {
            $newUri = $request->getUri()->withPath($this->endPointPath);
            $request = $request->withUri($newUri);
        }

        foreach ($this->headers as $name => $value) {
            $request->withHeader($name, $value);
        }

        $request = $request->withBody($body);

        return $request;
    }

    /**
     * @template T
     * @param class-string<T> $className
     * @return T
     */
    protected function handleRequest(RpcRequest|OtherRpcRequest $rpcRequest, string $className): mixed
    {
        $requestBody = $rpcRequest->toJson();
        $request = $this->createRequest($requestBody);

        $response = $this->httpClient->sendRequest($request);

        // When the www-authenticate header is present we try to authenticate in an additional request
        if ($response->hasHeader('www-authenticate')) {
            $uri = (string) $request->getUri()->getPath();
            $digestAuthenticator = new DigestAuthentication($this->username, $this->password, $uri, 'POST');
            $digest = $digestAuthenticator->getDigestResponse($response->getHeader('www-authenticate')[0]);

            $request = $request->withAddedHeader('Authorization', $digest);
            $response = $this->httpClient->sendRequest($request);
        }

        $body = $response->getBody()->__toString();

        if (($e = $this->getExceptionForInvalidResponse($body)) !== null) {
            throw $e;
        }

        // The response for the /json_rpc endpoint is contained in a result property
        $jsonResultPath = 'result';

        // The 'other' daemon methods are not contained in a result property, so just parse the whole response
        if ($this->isOtherDaemonMethodRequest()) {
            $jsonResultPath = [];
        }

        return $className::fromJsonString($body, $jsonResultPath);
    }

    protected function getExceptionForInvalidResponse(string $responseBody): ?MoneroRpcException
    {
        $json = json_decode($responseBody, true);
        if (!is_array($json)) {
            $json = [
                'error' => ['message' => $responseBody],
            ];
        }

        if (!array_key_exists('error', $json)) {
            return null;
        }

        $errorCode = ErrorCode::getErrorCodeFromString($json['error']['message']);
        return $errorCode->toException();
    }

    /**
     * @param string[] $headers
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function setCredentials(string $username, string $password): void
    {
        $this->username = $username;
        $this->password = $password;
    }

    private function isOtherDaemonMethodRequest(): bool
    {
        return $this->endPointPath !== self::DEFAULT_ENDPOINT_PATH;
    }
}
