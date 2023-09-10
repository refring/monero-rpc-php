<?php

namespace RefRing\MoneroRpcPhp;

use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientInterface;
use RefRing\MoneroRpcPhp\Enum\RpcClientType;

final class Builder
{
    private ?ClientInterface $httpClient = null;

    private string $url;

    /**
     * The HTTP headers for the requests.
     *
     * @var array<string, string>
     */
    private array $headers = [];

    private ?string $username = null;

    private ?string $password = null;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * Sets the HTTP client for the requests.
     * If no client is provided the factory will try to find one using PSR-18 HTTP Client Discovery.
     */
    public function withHttpClient(ClientInterface $client): self
    {
        $this->httpClient = $client;

        return $this;
    }

    /**
     * Adds a custom HTTP header to the requests.
     */
    public function withHttpHeader(string $name, string $value): self
    {
        $this->headers[$name] = $value;

        return $this;
    }

    public function withAuthentication(string $username, string $password): self
    {
        $this->username = $username;
        $this->password = $password;
        return $this;
    }

    public function build(RpcClientType $rpcClientType): WalletRpcClient|DaemonRpcClient
    {
        $httpClient = $this->httpClient ??= Psr18ClientDiscovery::find();

        if ($rpcClientType === RpcClientType::DAEMON) {
            $jsonRpcClient = new DaemonRpcClient($httpClient, $this->url);
        } else {
            $jsonRpcClient = new WalletRpcClient($httpClient, $this->url);
        }

        if ($this->username !== null && $this->password !== null) {
            $jsonRpcClient->setCredentials($this->username, $this->password);
        }

        $jsonRpcClient->setHeaders($this->headers);

        return $jsonRpcClient;
    }

    public function buildWalletClient(): WalletRpcClient
    {
        /** @phpstan-ignore-next-line  */
        return $this->build(RpcClientType::WALLET);
    }

    public function buildDaemonClient(): DaemonRpcClient
    {
        /** @phpstan-ignore-next-line  */
        return $this->build(RpcClientType::DAEMON);
    }
}
