<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\integration;

use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\ClientBuilder;
use RefRing\MoneroRpcPhp\DaemonRpcClient;
use RefRing\MoneroRpcPhp\Exception\InvalidDestinationException;
use RefRing\MoneroRpcPhp\Model\Address;
use RefRing\MoneroRpcPhp\Model\Amount;
use RefRing\MoneroRpcPhp\Tests\TestHelper;
use RefRing\MoneroRpcPhp\WalletRpc\Model\Destination;
use RefRing\MoneroRpcPhp\WalletRpc\Model\TransferType;
use RefRing\MoneroRpcPhp\WalletRpc\TransferResponse;
use RefRing\MoneroRpcPhp\WalletRpcClient;

final class TransferTest extends TestCase
{
    public static array $seeds = [TestHelper::WALLET_1_MNEMONIC, TestHelper::WALLET_2_MNEMONIC];

    public static array $wallets = [];

    private static DaemonRpcClient $daemonRpcClient;
    private static WalletRpcClient $walletRpcClient;

    public static int $runningBalance = 0;

    private const AMOUNT = 1000000000000;

    public static function tearDownAfterClass(): void
    {
        // Reset the blockchain
        $height = self::$daemonRpcClient->getHeight();
        self::$daemonRpcClient->popBlocks($height->height - 1);
        self::$daemonRpcClient->flushTxpool();
    }

    public static function setUpBeforeClass(): void
    {
        self::$daemonRpcClient = (new ClientBuilder(getenv('DAEMON_RPC_URL')))
            ->buildDaemonClient();
        self::$walletRpcClient = (new ClientBuilder(getenv('WALLET_RPC_URL')))
            ->buildWalletClient();

        self::$walletRpcClient->restoreDeterministicWallet('', '', self::$seeds[0]);
        self::$daemonRpcClient->generateBlocks(100, TestHelper::MAINNET_ADDRESS_1);
    }

    public function testWallet(): void
    {
        self::$walletRpcClient->refresh();
        $this->assertSame(101, self::$walletRpcClient->getHeight()->height);

        $result = self::$walletRpcClient->getBalance(0);
        $this->assertSame(59, $result->blocksToUnlock);
        self::$runningBalance = $result->balance;
    }

    public function testTransferEmptyDestination(): void
    {
        $this->expectException(InvalidDestinationException::class);
        self::$walletRpcClient->transfer([]);
    }

    // Disabled for now because this will give timeouts sometimes because of DNS lookups
    //    public function testTransferInvalidDestination(): void
    //    {
    //        $this->expectException(InvalidAddressException::class);
    //        self::$walletRpcClient->transfer(new Recipient(TestHelper::TESTNET_ADDRESS_1, 100));
    //    }

    public function testTransfer(): TransferResponse
    {
        self::$walletRpcClient->refresh();

        $result = self::$walletRpcClient->transfer(new Destination(TestHelper::MAINNET_ADDRESS_1, new Amount(self::AMOUNT)), getTxKey: false, getTxHex: true);

        $this->assertSame(64, strlen($result->txHash));
        $this->assertSame(0, strlen($result->txKey));
        $this->assertGreaterThan(0, (int) $result->amount->getAmount());
        $this->assertGreaterThan(0, $result->fee);
        self::$runningBalance -= $result->fee;

        $this->assertGreaterThan(0, strlen($result->txBlob));
        $this->assertSame(0, strlen($result->txMetadata));
        $this->assertSame(0, strlen($result->multisigTxset));
        $this->assertSame(0, strlen($result->unsignedTxset));

        $balanceResult = self::$walletRpcClient->getBalance();
        $this->assertSame($balanceResult->balance, self::$runningBalance);

        return $result;
    }

    #[Depends('testTransfer')]
    public function testFee(TransferResponse $transferResponse): void
    {
        $fee = $transferResponse->fee;
        $txWeight = $transferResponse->weight;

        $result = self::$daemonRpcClient->getFeeEstimate(10);
        $this->assertGreaterThan(0, (int) $result->fee->getAmount());
        $this->assertGreaterThan(0, $result->quantizationMask);

        $expectedFee = ($result->fee->getAmount() * 1 * $txWeight + $result->quantizationMask - 1);
        $this->assertLessThan(0.01, abs(1 - $fee / $expectedFee));
    }

    #[Depends('testTransfer')]
    public function testGetTransfers(TransferResponse $transferResponse): void
    {
        self::$walletRpcClient->refresh();

        $height = self::$daemonRpcClient->getInfo()->height;
        $result = self::$walletRpcClient->getTransfers(true, true, true, true, true);

        $this->assertSame($height - 1, count($result->in));
        //        $this->assertObjectNotHasProperty('out', $result); // Not mined yet
        $this->assertEquals(1, count($result->pending));
        foreach ($result->in as $transaction) {
            $this->assertEquals(TransferType::BLOCK, $transaction->type);
        }
    }

    #[Depends('testTransfer')]
    public function testTransferByTxId(TransferResponse $transferResponse): void
    {

        self::$daemonRpcClient->generateBlocks(1, TestHelper::MAINNET_ADDRESS_1);
        $result = self::$walletRpcClient->refresh();
        $this->assertSame(true, $result->receivedMoney);
        $height = self::$walletRpcClient->getHeight()->height;
        $result = self::$walletRpcClient->getTransferByTxid($transferResponse->txHash);

        $this->assertSame(1, count($result->transfers));
        $this->assertEquals($result->transfer, $result->transfers[0]);

        $transfer = $result->transfer;
        $this->assertSame($transferResponse->txHash, $transfer->txid);
        $this->assertSame('0000000000000000', $transfer->paymentId);
        $this->assertGreaterThan(0, $transfer->timestamp);
        $this->assertSame(0, (int) $transfer->amount->getAmount());
        $this->assertSame('', $transfer->note);
        $this->assertSame(1, count($transfer->destinations));
        $this->assertEquals(new Address(TestHelper::MAINNET_ADDRESS_1), $transfer->destinations[0]->address);
        $this->assertEquals(TransferType::OUTGOING, $transfer->type);
        $this->assertSame(0, $transfer->unlockTime);
        $this->assertSame(TestHelper::MAINNET_ADDRESS_1, $transfer->address);
        $this->assertSame(false, $transfer->doubleSpendSeen);
        $this->assertSame(1, $transfer->confirmations);
    }

    public function testRawTransactions(): void
    {
        $recipient = new Destination(TestHelper::MAINNET_ADDRESS_2, new Amount(1100000000000));
        $result = self::$walletRpcClient->transfer($recipient, getTxKey: true, doNotRelay: true, getTxHex: true);
        $this->assertSame(64, strlen($result->txHash));
        $this->assertSame(64, strlen($result->txKey));
        $this->assertEquals(Amount::fromXmr('1.1'), $result->amount);
        $this->assertGreaterThan(0, $result->fee);
        $this->assertGreaterThan(0, strlen($result->txBlob));
        $this->assertSame(0, strlen($result->txMetadata));
        $this->assertSame(0, strlen($result->multisigTxset));
        $this->assertSame(0, strlen($result->unsignedTxset));

        // We'll use these later
        $txId = $result->txHash;
        $fee = $result->fee;
        $amount = $result->amount;

        $result = self::$daemonRpcClient->sendRawTransaction($result->txBlob);
        $this->assertFalse($result->notRelayed);
        $this->assertFalse($result->lowMixin);
        $this->assertFalse($result->doubleSpend);
        $this->assertFalse($result->invalidInput);
        $this->assertFalse($result->invalidOutput);
        $this->assertFalse($result->tooBig);
        $this->assertFalse($result->overspend);
        $this->assertFalse($result->feeTooLow);

        self::$walletRpcClient->restoreDeterministicWallet('', '', self::$seeds[1]);
        self::$walletRpcClient->refresh();

        $result = self::$walletRpcClient->getTransfers(true, true, true, true, true);
        $this->assertCount(0, $result->in);
        $this->assertCount(0, $result->out);
        $this->assertCount(0, $result->pending);
        $this->assertCount(1, $result->pool);
        $this->assertCount(0, $result->failed);
    }

    #[Depends('testTransfer')]
    public function testScanTx(TransferResponse $transferResponse): void
    {
        $this->expectNotToPerformAssertions();
        $result = self::$walletRpcClient->scanTx([$transferResponse->txHash]);
    }
}
