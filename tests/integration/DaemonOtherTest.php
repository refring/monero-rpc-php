<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\integration;

use Http\Discovery\Psr18ClientDiscovery;
use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\DaemonOtherClient;

final class DaemonOtherTest extends TestCase
{
    private static DaemonOtherClient $rpcClient;

    public static function setUpBeforeClass(): void
    {
        $httpClient = Psr18ClientDiscovery::find();
        self::$rpcClient = new DaemonOtherClient($httpClient, 'http://127.0.0.1:18081/json_rpc');
    }

}
