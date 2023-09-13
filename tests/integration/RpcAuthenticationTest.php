<?php

namespace RefRing\MoneroRpcPhp\Tests\integration;

use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientExceptionInterface;
use RefRing\MoneroRpcPhp\Builder;
use RefRing\MoneroRpcPhp\Exception\AuthenticationException;

class RpcAuthenticationTest extends TestCase
{
    public const WALLET_RPC_URL = 'http://127.0.0.1:18084/json_rpc';
    public const DAEMON_RPC_URL = 'http://127.0.0.1:18085/json_rpc';

    public function testConnectionError(): void
    {
        $client = (new Builder('http://127.0.0.1:'.$this->findFreePort()))
            ->buildWalletClient();

        // @TODO Should this exception be wrapped ?
        $this->expectException(ClientExceptionInterface::class);
        $client->getVersion();
    }
    public function testWalletAuthFailure(): void
    {
        $client = (new Builder(self::WALLET_RPC_URL))
            ->buildWalletClient();

        $this->expectException(AuthenticationException::class);
        $client->getVersion();
    }

    public function testWalletAuth(): void
    {
        $client = (new Builder(self::WALLET_RPC_URL))
            ->withAuthentication('foo', 'bar')
            ->buildWalletClient();

        $this->assertGreaterThan(0, $client->getVersion()->version);
    }

    public function testDaemonAuthFailure(): void
    {
        $client = (new Builder(self::DAEMON_RPC_URL))
            ->buildDaemonClient();

        $this->expectException(AuthenticationException::class);
        $client->getVersion();
    }

    public function testDaemonAuth(): void
    {
        $client = (new Builder(self::DAEMON_RPC_URL))
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
