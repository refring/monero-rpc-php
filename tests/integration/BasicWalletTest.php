<?php

namespace RefRing\MoneroRpcPhp\Tests\integration;

use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\Builder;
use RefRing\MoneroRpcPhp\Exception\HttpApiException;
use RefRing\MoneroRpcPhp\Exception\InvalidLanguageException;
use RefRing\MoneroRpcPhp\Exception\WalletExistsException;
use RefRing\MoneroRpcPhp\Model\Address;
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
        self::$rpcClient->createWallet(TestHelper::getRandomWalletName(), 'English', null);
    }

    public function testCreateWalletWithEmptyPassword(): void
    {
        $this->expectNotToPerformAssertions();
        self::$rpcClient->createWallet(TestHelper::getRandomWalletName(), 'English', '');
    }

    public function testCreateWalletWithPassword(): void
    {
        $this->expectNotToPerformAssertions();
        self::$rpcClient->createWallet(TestHelper::getRandomWalletName(), 'English', TestHelper::WALLET_PWD_1);
    }

    public function testCreateWalletErrorAlreadyExists(): void
    {
        $this->expectException(WalletExistsException::class);
        $walletName = TestHelper::getRandomWalletName();
        self::$rpcClient->createWallet($walletName, 'English', null);
        self::$rpcClient->createWallet($walletName, 'English', null);
    }

    public function testCreateWalletErrorInvalidLanguage(): void
    {
        $this->expectException(InvalidLanguageException::class);
        self::$rpcClient->createWallet(TestHelper::getRandomWalletName(), 'Barolo', null);
    }

    public function testGetAddressIndex(): void
    {
        $walletName = TestHelper::getRandomWalletName();
        self::$rpcClient->createWallet($walletName, 'English', '');
        self::$rpcClient->openWallet($walletName);

        $address = self::$rpcClient->getAddress(0)->address;
        $addressIndex = self::$rpcClient->getAddressIndex($address)->index;
        $this->assertSame(0, $addressIndex->minor);
        $this->assertSame(0, $addressIndex->major);
    }

    public function testCreateAddress(): void
    {
        $walletName = TestHelper::getRandomWalletName();
        self::$rpcClient->createWallet($walletName, 'English', '');
        self::$rpcClient->openWallet($walletName);

        $createAddress = self::$rpcClient->createAddress(0);

        $this->assertSame(0, self::$rpcClient->getAddressIndex($createAddress->address)->index->major);
        $this->assertSame(1, self::$rpcClient->getAddressIndex($createAddress->address)->index->minor);
    }

    public function testCreateAddressMultiple(): void
    {
        $walletName = TestHelper::getRandomWalletName();
        self::$rpcClient->createWallet($walletName, 'English', '');
        self::$rpcClient->openWallet($walletName);

        $createAddress = self::$rpcClient->createAddress(0, null, 2);

        $address1 = $createAddress->addresses[0];
        $index1 = $createAddress->addressIndices[0];

        $address2 = $createAddress->addresses[1];
        $index2 = $createAddress->addressIndices[1];

        $this->assertSame($index1, self::$rpcClient->getAddressIndex($address1)->index->minor);
        $this->assertSame($index2, self::$rpcClient->getAddressIndex($address2)->index->minor);
    }

    public function testGetAddressIndexException(): void
    {
        $this->expectException(HttpApiException::class);
        self::$rpcClient->getAddressIndex(new Address('7BnERTpvL5MbCLtj5n9No7J5oE5hHiB3tVCK5cjSvCsYWD2WRJLFuWeKTLiXo5QJqt2ZwUaLy2Vh1Ad51K7FNgqcHgjW85o'));
    }
}
