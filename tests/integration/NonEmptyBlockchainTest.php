<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\integration;

use Http\Discovery\Psr18ClientDiscovery;
use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\DaemonRpc\GenerateblocksResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockHeaderByHashResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockHeaderByHeightResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetLastBlockHeaderResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\Model\BlockHeader;
use RefRing\MoneroRpcPhp\DaemonRpcClient;
use RefRing\MoneroRpcPhp\Enum\ResponseStatus;
use RefRing\MoneroRpcPhp\Exception\BlockNotAcceptedException;
use RefRing\MoneroRpcPhp\Exception\InvalidAddressException;
use RefRing\MoneroRpcPhp\Exception\InvalidBlockHeightException;
use RefRing\MoneroRpcPhp\Exception\InvalidBlockTemplateBlobException;
use RefRing\MoneroRpcPhp\Model\Amount;
use RefRing\MoneroRpcPhp\Model\BlockHash;
use RefRing\MoneroRpcPhp\Tests\TestHelper;

final class NonEmptyBlockchainTest extends TestCase
{
    /**
     * @var int
     */
    public const BLOCKS_TO_GENERATE = 10;

    private static DaemonRpcClient $daemonRpcClient;

    public static function tearDownAfterClass(): void
    {
        // Reset the blockchain
        $height = self::$daemonRpcClient->getHeight();
        self::$daemonRpcClient->popBlocks($height->height - 1);
        self::$daemonRpcClient->flushTxpool();
    }

    public static function setUpBeforeClass(): void
    {
        $httpClient = Psr18ClientDiscovery::find();
        self::$daemonRpcClient = new DaemonRpcClient($httpClient, getenv('DAEMON_RPC_URL'));
    }

    // STEP 1: we use a testnet address; however,
    // we are running in `regtest` mode, whose addresses have the same format as `mainnet`
    // addresses. Thus, `generate_blocks` should return an error when trying to generate blocks
    // and giving the coins created to a `testnet` address.
    public function testGenerateBlocksErrorInvalidAddress(): void
    {
        $this->expectException(InvalidAddressException::class);
        self::$daemonRpcClient->generateBlocks(self::BLOCKS_TO_GENERATE, TestHelper::TESTNET_ADDRESS_1);
    }

    // STEP 2: we generate blocks and give the coins to a `mainnet/regtest` address.
    // We then test the blockchain state after the blocks are created, and we get
    // the last two blocks created and call functions on the RPC using their hashes, test
    // their heights, etc.
    public function testGenerateBlocks(): GenerateblocksResponse
    {
        $startingBlockCount = self::$daemonRpcClient->getBlockCount();

        $result = self::$daemonRpcClient->generateBlocks(self::BLOCKS_TO_GENERATE, TestHelper::MAINNET_ADDRESS_1);
        $expectedHeight = $this->getExpectedHeightReturnedByGenerateBlocks($startingBlockCount->count, self::BLOCKS_TO_GENERATE);

        $this->assertSame($expectedHeight, $result->height);
        $this->assertNotEmpty($result->blocks);

        $finalBlockCount = self::$daemonRpcClient->getBlockCount();
        $this->assertSame($startingBlockCount->count + self::BLOCKS_TO_GENERATE, $finalBlockCount->count);

        return $result;
    }

    #[Depends('testGenerateBlocks')]
    public function testGeneratedBlockheightPlusOneError(GenerateblocksResponse $result): void
    {
        // Try and get the block hash for the returned height + 1 (should give an error)
        $this->expectException(InvalidBlockHeightException::class);
        self::$daemonRpcClient->onGetBlockHash($result->height + 1);
    }

    #[Depends('testGenerateBlocks')]
    public function testGeneratedBlockHash(GenerateblocksResponse $result): void
    {
        // Compare the latest hash
        $blockHash = self::$daemonRpcClient->onGetBlockHash($result->height);
        $lastBlockHashResult = end($result->blocks);
        $this->assertSame((string) $blockHash, (string) $lastBlockHashResult);
    }

    #[Depends('testGenerateBlocks')]
    public function testGeneratedLastBlockHeader(GenerateblocksResponse $result): void
    {
        $lastBlockHashResult = end($result->blocks);
        $secondLastBlockHash = prev($result->blocks);
        $blockHeight = self::$daemonRpcClient->getBlockCount()->count - 1;
        $blockHeader = $this->getLastBlockHeaderMock($lastBlockHashResult, $blockHeight, $secondLastBlockHash);

        $expected = new GetLastBlockHeaderResponse();
        $expected->untrusted = false;
        $expected->credits = 0;
        $expected->topHash = '';
        $expected->status = ResponseStatus::OK;
        $expected->blockHeader = $blockHeader;

        $lastBlockHeader = self::$daemonRpcClient->getLastBlockHeader();

        // Overwrite a couple non-deterministic fields
        $lastBlockHeader->blockHeader->minerTxHash = '';
        $lastBlockHeader->blockHeader->timestamp = 0;

        $this->assertEquals($expected, $lastBlockHeader);
    }

    #[Depends('testGenerateBlocks')]
    public function testGeneratedLastBlockHeaderFromBlockHash(GenerateblocksResponse $result): void
    {
        $lastBlockHashResult = end($result->blocks);
        $secondLastBlockHash = prev($result->blocks);
        $blockHeight = self::$daemonRpcClient->getBlockCount()->count - 1;
        $blockHeader = $this->getLastBlockHeaderMock($lastBlockHashResult, $blockHeight, $secondLastBlockHash);

        $expected = new GetBlockHeaderByHashResponse();
        $expected->untrusted = false;
        $expected->credits = 0;
        $expected->topHash = '';
        $expected->status = ResponseStatus::OK;
        $expected->blockHeader = $blockHeader;

        $lastBlockHeaderByHash = self::$daemonRpcClient->getBlockHeaderByHash((string)$lastBlockHashResult);

        // Overwrite a couple non-deterministic fields
        $lastBlockHeaderByHash->blockHeader->minerTxHash = '';
        $lastBlockHeaderByHash->blockHeader->timestamp = 0;

        $this->assertEquals($expected, $lastBlockHeaderByHash);
    }

    #[Depends('testGenerateBlocks')]
    public function testGeneratedLastBlockHeaderFromHeight(GenerateblocksResponse $result): void
    {
        $lastBlockHashResult = end($result->blocks);
        $secondLastBlockHash = prev($result->blocks);
        $blockHeight = self::$daemonRpcClient->getBlockCount()->count - 1;
        $blockHeader = $this->getLastBlockHeaderMock($lastBlockHashResult, $blockHeight, $secondLastBlockHash);

        $expected = new GetBlockHeaderByHeightResponse();
        $expected->untrusted = false;
        $expected->credits = 0;
        $expected->topHash = '';
        $expected->status = ResponseStatus::OK;
        $expected->blockHeader = $blockHeader;

        $lastBlockHeaderByHeight = self::$daemonRpcClient->getBlockHeaderByHeight(self::BLOCKS_TO_GENERATE);

        // Overwrite a couple non-deterministic fields
        $lastBlockHeaderByHeight->blockHeader->minerTxHash = '';
        $lastBlockHeaderByHeight->blockHeader->timestamp = 0;

        $this->assertEquals($expected, $lastBlockHeaderByHeight);
    }

    public function testGeneratedBlocksByRange(): void
    {
        $blockHeadersByRange = self::$daemonRpcClient->getBlockHeadersRange(self::BLOCKS_TO_GENERATE - 1, self::BLOCKS_TO_GENERATE);

        $lastBlockHeaderByHeight = self::$daemonRpcClient->getBlockHeaderByHeight(self::BLOCKS_TO_GENERATE);
        $secondLastBlockHeaderByHeight = self::$daemonRpcClient->getBlockHeaderByHeight(self::BLOCKS_TO_GENERATE - 1);

        $this->assertEquals($blockHeadersByRange->headers, [$secondLastBlockHeaderByHeight->blockHeader, $lastBlockHeaderByHeight->blockHeader]);
    }

    public function testSubmitBlock(): void
    {
        $blockTemplate = self::$daemonRpcClient->getBlockTemplate(TestHelper::MAINNET_ADDRESS_1, 0);
        $startBlockCount = self::$daemonRpcClient->getBlockCount()->count;

        $result = self::$daemonRpcClient->submitBlock([$blockTemplate->blocktemplateBlob]);

        $this->assertSame(ResponseStatus::OK, $result->status);

        $this->assertSame($startBlockCount + 1, self::$daemonRpcClient->getBlockCount()->count);
    }

    public function testSubmitBlockErrorWrongBlockBlob(): void
    {
        $blob = '0123456789';
        $this->expectException(InvalidBlockTemplateBlobException::class);

        self::$daemonRpcClient->submitBlock([$blob]);
    }

    public function testSubmitBlockErrorNotAccepted(): void
    {
        $blob = '0707e6bdfedc053771512f1bc27c62731ae9e8f2443db64ce742f4e57f5cf8d393de28551e441a0000000002fb830a01ffbf830a018cfe88bee283060274c0aae2ef5730e680308d9c00b6da59187ad0352efe3c71d36eeeb28782f29f2501bd56b952c3ddc3e350c2631d3a5086cac172c56893831228b17de296ff4669de020200000000';
        $this->expectException(BlockNotAcceptedException::class);

        self::$daemonRpcClient->submitBlock([$blob]);
    }

    private function getExpectedHeightReturnedByGenerateBlocks(int $startBlockCount, int $amountOfBlocks): int
    {
        $height = $startBlockCount - 1;
        return $height + $amountOfBlocks;
    }

    private function getLastBlockHeaderMock(BlockHash $lastBlockHashResult, int $blockHeight, BlockHash $secondLastBlockHash): BlockHeader
    {
        return new BlockHeader(
            85,
            85,
            11,
            0,
            0,
            1,
            0,
            $lastBlockHashResult,
            $blockHeight,
            176470,
            16,
            '',
            16,
            0,
            0,
            false,
            '',
            $secondLastBlockHash,
            new Amount(35183734559807),
            0,
            '0xb',
            '0x1'
        );
    }

    public function testPopBlocks(): void
    {
        $startBlockCount = self::$daemonRpcClient->getBlockCount()->count;
        $blocksToPop = 2;
        $result = self::$daemonRpcClient->popBlocks($blocksToPop);

        $this->assertSame($startBlockCount - $blocksToPop, $result->height);
    }
}
