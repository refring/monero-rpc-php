<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\integration;

use Http\Discovery\Psr18ClientDiscovery;
use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockHeaderByHashResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockHeaderByHeightResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockTemplateResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetLastBlockHeaderResponse;
use RefRing\MoneroRpcPhp\Enum\ResponseStatus;
use RefRing\MoneroRpcPhp\Exception\InvalidAddressException;
use RefRing\MoneroRpcPhp\Exception\InvalidBlockHashException;
use RefRing\MoneroRpcPhp\Exception\InvalidBlockHeightException;
use RefRing\MoneroRpcPhp\Exception\InvalidBlockHeightRangeException;
use RefRing\MoneroRpcPhp\Exception\InvalidReservedSizeException;
use RefRing\MoneroRpcPhp\Model\BlockHeader;
use RefRing\MoneroRpcPhp\DaemonRpcClient;
use RefRing\MoneroRpcPhp\Monero\Amount;
use RefRing\MoneroRpcPhp\Tests\TestHelper;

final class EmptyBlockchainTest extends TestCase
{
    private static DaemonRpcClient $daemonRpcClient;

    public static function setUpBeforeClass(): void
    {
        $httpClient = Psr18ClientDiscovery::find();
        self::$daemonRpcClient = new DaemonRpcClient($httpClient, 'http://127.0.0.1:18081/json_rpc');
    }

    public function testBlockCountHeight(): void
    {
        $count = self::$daemonRpcClient->getBlockCount();
        $this->assertSame(1, $count->count);
    }

    public function testGetBlockHashInvalidHeight(): void
    {
        $this->expectException(InvalidBlockHeightException::class);
        //        $this->expectExceptionMessage('Invalid height 10 supplied');
        self::$daemonRpcClient->onGetBlockHash(10);
    }

    public function testGenesisHash(): void
    {
        $blockHash = self::$daemonRpcClient->onGetBlockHash(0);
        $this->assertSame(TestHelper::GENESIS_BLOCK_HASH, (string) $blockHash);
    }

    public function testGetBlockTemplate(): void
    {
        $address = TestHelper::MAINNET_ADDRESS_1;

        $expectedBlockTemplate = new GetBlockTemplateResponse();
        $expectedBlockTemplate->difficulty = 1;
        $expectedBlockTemplate->height = 1;
        $expectedBlockTemplate->expectedReward = 35184338534400;
        $expectedBlockTemplate->prevHash = TestHelper::GENESIS_BLOCK_HASH;
        $expectedBlockTemplate->untrusted = false;
        $expectedBlockTemplate->difficultyTop64 = 0;
        $expectedBlockTemplate->nextSeedHash = '';
        $expectedBlockTemplate->seedHash = TestHelper::GENESIS_BLOCK_HASH;
        $expectedBlockTemplate->seedHeight = 0;
        $expectedBlockTemplate->status = ResponseStatus::OK;
        $expectedBlockTemplate->wideDifficulty = '0x1';
        $expectedBlockTemplate->blockhashingBlob = '';
        $expectedBlockTemplate->blocktemplateBlob = '';
        $expectedBlockTemplate->reservedOffset = 10;

        $blockTemplate = self::$daemonRpcClient->getBlockTemplate($address, 60);

        // The fields are non-deterministic so overwrite for the test
        $blockTemplate->blockhashingBlob = '';
        $blockTemplate->blocktemplateBlob = '';
        $blockTemplate->reservedOffset = 10;

        $this->assertEquals($expectedBlockTemplate, $blockTemplate);
    }

    public function testBlockTemplateErrorInvalidSize(): void
    {
        $this->expectException(InvalidReservedSizeException::class);
        $address = TestHelper::MAINNET_ADDRESS_1;
        self::$daemonRpcClient->getBlockTemplate($address, 256);
    }

    public function testBlockTemplateErrorInvalidAddress(): void
    {
        $this->expectException(InvalidAddressException::class);
        $address = 'xxx';
        self::$daemonRpcClient->getBlockTemplate($address, 10);
    }

    private function getGenesisBlockHeader(): BlockHeader
    {
        return new BlockHeader(
            80,
            80,
            1,
            0,
            0,
            1,
            0,
            TestHelper::GENESIS_BLOCK_HASH,
            0,
            80,
            1,
            'c88ce9783b4f11190d7b9c17a69c1c52200f9faaee8e98dd07e6811175177139',
            0,
            10000,
            0,
            false,
            '',
            '0000000000000000000000000000000000000000000000000000000000000000',
            new Amount(17592186044415),
            0,
            '0x1',
            '0x1'
        );
    }

    public function testLastBlockHeader(): void
    {
        $expected = new GetLastBlockHeaderResponse();
        $expected->untrusted = false;
        $expected->credits = 0;
        $expected->topHash = '';
        $expected->status = ResponseStatus::OK;
        $expected->blockHeader = $this->getGenesisBlockHeader();

        $blockHeader = self::$daemonRpcClient->getLastBlockHeader();
        $this->assertEquals($expected, $blockHeader);
    }

    public function testGetBLockHeaderByHash(): void
    {
        $expected = new GetBlockHeaderByHashResponse();
        $expected->untrusted = false;
        $expected->credits = 0;
        $expected->topHash = '';
        $expected->status = ResponseStatus::OK;
        $expected->blockHeader = $this->getGenesisBlockHeader();

        $blockHeader = self::$daemonRpcClient->getBlockHeaderByHash(TestHelper::GENESIS_BLOCK_HASH);
        $this->assertEquals($expected, $blockHeader);
    }

    public function testGetBlockHeaderByHashErrorNotFoundEmpty(): void
    {
        $this->expectException(InvalidBlockHashException::class);
        self::$daemonRpcClient->getBlockHeaderByHash('0000000000000000000000000000000000000000000000000000000000000000');
    }

    public function testGetBlockHeaderByHashErrorNotFound(): void
    {
        $this->expectException(InvalidBlockHashException::class);
        self::$daemonRpcClient->getBlockHeaderByHash('4444444444444444444444444444444444444444444444444444444444444444');
    }

    public function testGetBlockHeaderByHeight(): void
    {
        $expected = new GetBlockHeaderByHeightResponse();
        $expected->untrusted = false;
        $expected->credits = 0;
        $expected->topHash = '';
        $expected->status = ResponseStatus::OK;
        $expected->blockHeader = $this->getGenesisBlockHeader();

        $blockHeader = self::$daemonRpcClient->getBlockHeaderByHeight(0);
        $this->assertEquals($expected, $blockHeader);
    }

    public function testGetBlockHeaderByHeightError(): void
    {
        $this->expectException(InvalidBlockHeightException::class);
        self::$daemonRpcClient->getBlockHeaderByHeight(10);
    }

    public function testGetBlockHeaderRange(): void
    {
        $blockHeaderList = self::$daemonRpcClient->getBlockHeadersRange(0, 0);
        $this->assertEquals([$this->getGenesisBlockHeader()], $blockHeaderList->headers);
    }

    public function testGetBlockHeaderRangeError(): void
    {
        $this->expectException(InvalidBlockHeightRangeException::class);
        self::$daemonRpcClient->getBlockHeadersRange(0, 10);
    }

    public function testGetBlockHeaderRangeErrorNonZero(): void
    {
        $this->expectException(InvalidBlockHeightRangeException::class);
        self::$daemonRpcClient->getBlockHeadersRange(10, 20);
    }
}
