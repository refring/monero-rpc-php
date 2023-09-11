<?php

namespace RefRing\MoneroRpcPhp\Tests\integration;

use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\Builder;
use RefRing\MoneroRpcPhp\Exception\HttpApiException;
use RefRing\MoneroRpcPhp\Exception\InvalidLanguageException;
use RefRing\MoneroRpcPhp\Exception\WalletExistsException;
use RefRing\MoneroRpcPhp\Tests\TestHelper;
use RefRing\MoneroRpcPhp\WalletRpcClient;

class BasicWalletTest extends TestCase
{
    private static WalletRpcClient $rpcClient;

    public static function setUpBeforeClass(): void
    {
        self::$rpcClient = (new Builder(TestHelper::WALLET_RPC_URL))
            ->buildWalletClient();
    }

    public function testGetVersion(): void
    {
        $version = self::$rpcClient->getVersion();
        $this->assertGreaterThan(0, $version->version);
    }

    public function testCreateWallet(): void
    {
        $this->expectNotToPerformAssertions();
        self::$rpcClient->createWallet(TestHelper::getRandomWalletName(), null, 'English');
    }

    public function testCreateWalletWithEmptyPassword(): void
    {
        $this->expectNotToPerformAssertions();
        self::$rpcClient->createWallet(TestHelper::getRandomWalletName(), '', 'English');
    }

    public function testCreateWalletWithPassword(): void
    {
        $this->expectNotToPerformAssertions();
        self::$rpcClient->createWallet(TestHelper::getRandomWalletName(), TestHelper::WALLET_PWD_1, 'English');
    }

    public function testCreateWalletErrorAlreadyExists(): void
    {
        $this->expectException(WalletExistsException::class);
        $walletName = TestHelper::getRandomWalletName();
        self::$rpcClient->createWallet($walletName, null, 'English');
        self::$rpcClient->createWallet($walletName, null, 'English');
    }

    public function testCreateWalletErrorInvalidLanguage(): void
    {
        $this->expectException(InvalidLanguageException::class);
        self::$rpcClient->createWallet(TestHelper::getRandomWalletName(), null, 'Barolo');
    }

    public function testGetAddressIndexException(): void
    {
        $this->expectException(HttpApiException::class);
        self::$rpcClient->getAddressIndex('7BnERTpvL5MbCLtj5n9No7J5oE5hHiB3tVCK5cjSvCsYWD2WRJLFuWeKTLiXo5QJqt2ZwUaLy2Vh1Ad51K7FNgqcHgjW85o');
    }
}
