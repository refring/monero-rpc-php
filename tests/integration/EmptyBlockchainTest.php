<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\integration;

use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockTemplateResponse;
use RefRing\MoneroRpcPhp\Exception\InvalidAddressException;
use RefRing\MoneroRpcPhp\Exception\InvalidBlockHeightException;
use RefRing\MoneroRpcPhp\Exception\InvalidReservedSizeException;
use RefRing\MoneroRpcPhp\RegtestRpcClient;

final class EmptyBlockchainTest extends TestCase
{
    private static RegtestRpcClient $regtestRpcClient;

    const GENESIS_BLOCK_HASH= '418015bb9ae982a1975da7d79277c2705727a56894ba0fb246adaabb1f4632e3';

    public static function setUpBeforeClass(): void
    {
        $httpClient = new \GuzzleHttp\Client();
        self::$regtestRpcClient = new RegtestRpcClient($httpClient, 'http://127.0.0.1:18081/json_rpc');
    }

    public function testBlockCountHeight(): void
    {
        $count = self::$regtestRpcClient->getBlockCount();
        $this->assertSame(1, $count->count);
    }

    public function testGetBlockHashInvalidHeight(): void
    {
        $this->expectException(InvalidBlockHeightException::class);
        $this->expectExceptionMessage('Invalid height 10 supplied');
        self::$regtestRpcClient->onGetBlockHash(10);
    }

    public function testGenesisHash(): void
    {
        $blockHash = self::$regtestRpcClient->onGetBlockHash(0);
        $this->assertSame(self::GENESIS_BLOCK_HASH, (string) $blockHash);
    }

    public function testGetBlockTemplate(): void
    {
        $address = '44GBHzv6ZyQdJkjqZje6KLZ3xSyN1hBSFAnLP6EAqJtCRVzMzZmeXTC2AHKDS9aEDTRKmo6a6o9r9j86pYfhCWDkKjbtcns';

        $expectedBlockTemplate = new GetBlockTemplateResponse();
        $expectedBlockTemplate->difficulty = 1;
        $expectedBlockTemplate->height = 1;
        $expectedBlockTemplate->expectedReward = 35184338534400;
        $expectedBlockTemplate->prevHash = self::GENESIS_BLOCK_HASH;
        $expectedBlockTemplate->untrusted = false;
        $expectedBlockTemplate->difficultyTop64 = 0;
        $expectedBlockTemplate->nextSeedHash = '';
        $expectedBlockTemplate->seedHash = self::GENESIS_BLOCK_HASH;
        $expectedBlockTemplate->seedHeight = 0;
        $expectedBlockTemplate->status = 'OK';
        $expectedBlockTemplate->wideDifficulty = '0x1';
        $expectedBlockTemplate->blockhashingBlob = '';
        $expectedBlockTemplate->blocktemplateBlob = '';
        $expectedBlockTemplate->reservedOffset = 10;

        $blockTemplate = self::$regtestRpcClient->getBlockTemplate($address, 60);

        // The fields are non-deterministic so overwrite for the test
        $blockTemplate->blockhashingBlob = '';
        $blockTemplate->blocktemplateBlob = '';
        $blockTemplate->reservedOffset = 10;

        $this->assertEquals($expectedBlockTemplate, $blockTemplate);
    }

    public function testBlockTemplateErrorInvalidSize(): void
    {
        $this->expectException(InvalidReservedSizeException::class);
        $address = '44GBHzv6ZyQdJkjqZje6KLZ3xSyN1hBSFAnLP6EAqJtCRVzMzZmeXTC2AHKDS9aEDTRKmo6a6o9r9j86pYfhCWDkKjbtcns';
        self::$regtestRpcClient->getBlockTemplate($address, 256);
    }

    public function testBlockTemplateErrorInvalidAddress(): void
    {
        $this->expectException(InvalidAddressException::class);
        $address = 'xxx';
        self::$regtestRpcClient->getBlockTemplate($address, 10);
    }
}

