<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\integration;

use Http\Discovery\Psr18ClientDiscovery;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Depends;
use RefRing\MoneroRpcPhp\DaemonOtherClient;
use RefRing\MoneroRpcPhp\DaemonRpc\GenerateblocksResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockHeaderByHashResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockHeaderByHeightResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetLastBlockHeaderBaseResponse;
use RefRing\MoneroRpcPhp\Enum\ResponseStatus;
use RefRing\MoneroRpcPhp\Exception\BlockNotAcceptedException;
use RefRing\MoneroRpcPhp\Exception\InvalidAddressException;
use RefRing\MoneroRpcPhp\Exception\InvalidBlockHeightException;
use RefRing\MoneroRpcPhp\Exception\InvalidBlockTemplateBlobException;
use RefRing\MoneroRpcPhp\Model\BlockHeader;
use RefRing\MoneroRpcPhp\RegtestRpcClient;
use RefRing\MoneroRpcPhp\Tests\TestHelper;

final class DaemonOtherTest extends TestCase
{
    private static DaemonOtherClient $rpcClient;

    public static function setUpBeforeClass(): void
    {
        $httpClient = Psr18ClientDiscovery::find();
        self::$rpcClient = new DaemonOtherClient($httpClient, 'http://127.0.0.1:18081/json_rpc');
    }
    public function testPopBlocks(): void
    {
        $result = self::$rpcClient->popBlocks(1);
        print_r($result);
    }
}
