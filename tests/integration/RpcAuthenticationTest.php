<?php

namespace RefRing\MoneroRpcPhp\Tests\integration;

use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\Builder;
use RefRing\MoneroRpcPhp\Exception\AuthenticationException;

class RpcAuthenticationTest extends TestCase
{
    public const WALLET_RPC_URL = 'http://127.0.0.1:18084/json_rpc';
    public const DAEMON_RPC_URL = 'http://127.0.0.1:18085/json_rpc';
    public function testWalletAuthFailure()
    {
        $client = (new Builder(self::WALLET_RPC_URL))
            ->buildWalletClient();

        $this->expectException(AuthenticationException::class);
        $client->getVersion();
    }

    public function testWalletAuth()
    {
        $client = (new Builder(self::WALLET_RPC_URL))
            ->withAuthentication('foo', 'bar')
            ->buildWalletClient();

        $this->assertGreaterThan(0, $client->getVersion()->version);
    }

    public function testDaemonAuthFailure()
    {
        $client = (new Builder(self::DAEMON_RPC_URL))
            ->buildDaemonClient();

        $this->expectException(AuthenticationException::class);
        $client->getVersion();
    }

    public function testDaemonAuth()
    {
        $client = (new Builder(self::DAEMON_RPC_URL))
            ->withAuthentication('foo', 'bar')
            ->buildDaemonClient();

        $this->assertGreaterThan(0, $client->getVersion()->version);
    }
}
