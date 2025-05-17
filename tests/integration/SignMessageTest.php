<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\integration;

use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\ClientBuilder;
use RefRing\MoneroRpcPhp\Enum\SignatureType;
use RefRing\MoneroRpcPhp\Model\Address;
use RefRing\MoneroRpcPhp\Tests\TestHelper;
use RefRing\MoneroRpcPhp\WalletRpcClient;

final class SignMessageTest extends TestCase
{
    private static WalletRpcClient $walletRpcClient;


    public static function setUpBeforeClass(): void
    {
        self::$walletRpcClient = (new ClientBuilder(getenv('WALLET_RPC_URL')))
            ->buildWalletClient();

        self::$walletRpcClient->restoreDeterministicWallet('', '', TestHelper::WALLET_1_MNEMONIC);
    }

    public function testSpendSignature(): void
    {
        $this->testSigning(SignatureType::SPEND);
    }

    public function testViewSignature(): void
    {
        $this->testSigning(SignatureType::VIEW);
    }

    private function testSigning(SignatureType $signatureType)
    {
        $address = new Address(TestHelper::MAINNET_ADDRESS_1);
        $messages = ['test', ''];

        foreach ($messages as $message) {
            $result = self::$walletRpcClient->sign($message, 0, 0, $signatureType);

            $signature = $result->signature;
            $result = self::$walletRpcClient->verify($message, $address, $signature);

            $this->assertTrue($result->good);
            $this->assertFalse($result->old);
            $this->assertEquals($signatureType, $result->signatureType);
        }
    }

}
