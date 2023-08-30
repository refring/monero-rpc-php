<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp;

use Http\Discovery\Psr17Factory;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use RefRing\MoneroRpcPhp\Enum\ErrorCode;
use RefRing\MoneroRpcPhp\Exception\HttpApiException;
use RefRing\MoneroRpcPhp\Exception\MoneroRpcException;
use RefRing\MoneroRpcPhp\Request\RpcRequest;

abstract class JsonRpcClient
{
    public function __construct(private readonly ClientInterface $httpClient, private readonly string $url)
    {

    }

    public function createRequest(string $json): RequestInterface
    {
        $psr17Factory = new Psr17Factory();

        $body = $psr17Factory->createStream($json);

        $request = $psr17Factory->createRequest('POST', $this->url);

        $request = $request->withBody($body);

        return $request;
    }

    /**
     * @template T
     * @param class-string<T> $className
     * @return T
     */
    protected function handleRequest(RpcRequest $rpcRequest, string $className): mixed
    {
        $requestBody = $rpcRequest->toJson();
//        echo $requestBody;
        $request = $this->createRequest($requestBody);
        $response = $this->httpClient->sendRequest($request);
        $body = $response->getBody()->__toString();
//        var_dump($body);

        if ($e = $this->getExceptionForInvalidResponse($body)) {
            throw $e;
        }


        return $className::fromJsonString($body, 'result');
    }

    protected function getExceptionForInvalidResponse(string $responseBody): ?MoneroRpcException
    {
        $json = json_decode($responseBody, true);
        if ($json === null) {
            $json = [
                'error' => ['message' => $responseBody],
            ];
        }

        if (!array_key_exists('error', $json)) {
            return null;
        }

        $errorCode = ErrorCode::tryFrom($json['error']['message']);
        if ($errorCode !== null) {
            return $errorCode->toException();
        }

        return new HttpApiException("Got an invalid http response: {$json['error']['message']}");
    }
}
