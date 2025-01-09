<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\integration;

use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientExceptionInterface;
use RefRing\MoneroRpcPhp\ClientBuilder;
use RefRing\MoneroRpcPhp\Exception\AuthenticationException;

class RpcAuthenticationTest extends TestCase
{
    public function testConnectionError(): void
    {
        $client = (new ClientBuilder('http://127.0.0.1:'.$this->findFreePort()))
            ->buildWalletClient();

        // @TODO Should this exception be wrapped ?
        $this->expectException(ClientExceptionInterface::class);
        $client->getVersion();
    }

    public function testWalletAuthFailure(): void
    {
        $client = (new ClientBuilder(getenv('WALLET_RPC_URL_AUTH')))
            ->buildWalletClient();

        $this->expectException(AuthenticationException::class);
        $client->getVersion();
    }

    public function testWalletAuth(): void
    {
        $client = (new ClientBuilder(getenv('WALLET_RPC_URL_AUTH')))
            ->withAuthentication('foo', 'bar')
            ->buildWalletClient();

        $this->assertGreaterThan(0, $client->getVersion()->version);
    }

    public function testDaemonAuthFailure(): void
    {
        $client = (new ClientBuilder(getenv('DAEMON_RPC_URL_AUTH')))
            ->buildDaemonClient();

        $this->expectException(AuthenticationException::class);
        $client->getVersion();
    }

    public function testDaemonAuth(): void
    {
        $client = (new ClientBuilder(getenv('DAEMON_RPC_URL_AUTH')))
            ->withAuthentication('foo', 'bar')
            ->buildDaemonClient();

        $this->assertGreaterThan(0, $client->getVersion()->version);
    }

    /**
     * Find a free port on the system
     */
    private function findFreePort(): int
    {
        $socket = socket_create_listen(0);
        if ($socket === false) {
            throw new \Exception("Could not create open socket.");
        }

        socket_getsockname($socket, $addr, $port);
        socket_close($socket);

        return $port;
    }
}
