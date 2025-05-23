<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\integration;

use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\ClientBuilder;
use RefRing\MoneroRpcPhp\DaemonRpcClient;
use RefRing\MoneroRpcPhp\Enum\NetType;
use RefRing\MoneroRpcPhp\Exception\AccountIndexOutOfBoundException;
use RefRing\MoneroRpcPhp\Exception\AddressIndexOutOfBoundException;
use RefRing\MoneroRpcPhp\Exception\AddressNotInWalletException;
use RefRing\MoneroRpcPhp\Exception\AttributeNotFoundException;
use RefRing\MoneroRpcPhp\Exception\HttpApiException;
use RefRing\MoneroRpcPhp\Exception\IndexOutOfRangeException;
use RefRing\MoneroRpcPhp\Exception\InvalidAddressException;
use RefRing\MoneroRpcPhp\Exception\InvalidLanguageException;
use RefRing\MoneroRpcPhp\Exception\InvalidOriginalPasswordException;
use RefRing\MoneroRpcPhp\Exception\InvalidPaymentIdException;
use RefRing\MoneroRpcPhp\Exception\NoWalletFileException;
use RefRing\MoneroRpcPhp\Exception\OpenWalletException;
use RefRing\MoneroRpcPhp\Exception\TagNotFoundException;
use RefRing\MoneroRpcPhp\Exception\WalletExistsException;
use RefRing\MoneroRpcPhp\Model\Address;
use RefRing\MoneroRpcPhp\Model\Amount;
use RefRing\MoneroRpcPhp\Tests\KeyPairHelper;
use RefRing\MoneroRpcPhp\Tests\TestHelper;
use RefRing\MoneroRpcPhp\WalletRpc\CreateAccountResponse;
use RefRing\MoneroRpcPhp\WalletRpc\CreateAddressResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GenerateFromKeysResponse;
use RefRing\MoneroRpcPhp\WalletRpc\Model\QueryKeyType;
use RefRing\MoneroRpcPhp\WalletRpc\Model\SubAddressIndex;
use RefRing\MoneroRpcPhp\WalletRpcClient;

class BasicWalletTest extends TestCase
{
    private static WalletRpcClient $rpcClient;
    private static DaemonRpcClient $daemonRpcClient;

    private static string $walletNoPwd;
    private static string $walletWithEmptyPwd;
    private static string $walletWithPwd;

    public const DEFAULT_ACCOUNT_INDEX = 0;
    public const ACCOUNT_TAG = 'TAG123';
    public const ACCOUNT_TAG_DESCRIPTION = 'TAG123_DESCRIPTION';
    public const ADDRESS_BOOK_DESCRIPTION = 'ADDRESS_BOOK_DESCRIPTION';
    public const ADDRESS_BOOK_DESCRIPTION_EDIT = 'ADDRESS_BOOK_DESCRIPTION_EDIT';
    public const PAYMENT_ID_1 = '0123456789abcdef';

    public static function setUpBeforeClass(): void
    {
        self::$rpcClient = (new ClientBuilder(getenv('WALLET_RPC_URL')))
            ->buildWalletClient();
        self::$daemonRpcClient = (new ClientBuilder(getenv('DAEMON_RPC_URL')))->buildDaemonClient();
    }

    public function testGetVersion(): void
    {
        $version = self::$rpcClient->getVersion();
        $this->assertGreaterThan(0, $version->version);
    }

    public function testCreateWallet(): void
    {
        $this->expectNotToPerformAssertions();
        self::$walletNoPwd = TestHelper::getRandomWalletName();
        self::$rpcClient->createWallet(self::$walletNoPwd, 'English', null);
    }

    public function testCreateWalletWithEmptyPassword(): void
    {
        $this->expectNotToPerformAssertions();
        self::$walletWithEmptyPwd = TestHelper::getRandomWalletName();
        self::$rpcClient->createWallet(self::$walletWithEmptyPwd, 'English', '');
    }

    public function testCreateWalletErrorAlreadyExists(): void
    {
        $this->expectException(WalletExistsException::class);
        self::$rpcClient->createWallet(self::$walletNoPwd, 'English', null);
    }

    public function testCreateWalletErrorInvalidLanguage(): void
    {
        $this->expectException(InvalidLanguageException::class);
        self::$rpcClient->createWallet(TestHelper::getRandomWalletName(), 'Barolo', null);
    }

    public function testCloseWallet(): void
    {
        $this->expectNotToPerformAssertions();
        self::$rpcClient->closeWallet();
    }

    public function testCloseWalletError(): void
    {
        $this->expectException(NoWalletFileException::class);
        self::$rpcClient->closeWallet();
    }

    #[Depends('testCreateWalletWithEmptyPassword')]
    public function testOpenWalletWithEmptyPassword(): void
    {
        $this->expectNotToPerformAssertions();
        self::$rpcClient->openWallet(self::$walletWithEmptyPwd, '');
    }

    #[Depends('testCreateWallet')]
    public function testOpenWallet(): void
    {
        $this->expectNotToPerformAssertions();
        self::$rpcClient->openWallet(self::$walletNoPwd);

        // Try to open it twice
        self::$rpcClient->openWallet(self::$walletNoPwd);
    }

    public function testOpenWalletInvalidFilename(): void
    {
        $this->expectException(OpenWalletException::class);
        self::$rpcClient->openWallet(TestHelper::getRandomWalletName());
    }

    public function testCreateWalletWithPassword(): void
    {
        $this->expectNotToPerformAssertions();
        self::$walletWithPwd = TestHelper::getRandomWalletName();
        self::$rpcClient->createWallet(self::$walletWithPwd, 'English', TestHelper::WALLET_PWD_1);
    }

    #[Depends('testCreateWalletWithPassword')]
    public function testOpenWalletWithPassword(): void
    {
        $this->expectNotToPerformAssertions();
        self::$rpcClient->openWallet(self::$walletWithPwd, TestHelper::WALLET_PWD_1);
    }

    #[Depends('testCreateWalletWithPassword')]
    public function testOpenWalletNoPasswordError(): void
    {
        $this->expectException(OpenWalletException::class);
        self::$rpcClient->openWallet(self::$walletWithPwd);
    }
    #[Depends('testCreateWalletWithPassword')]
    public function testOpenWalletInvalidPassword(): void
    {
        $this->expectException(OpenWalletException::class);
        self::$rpcClient->openWallet(self::$walletWithPwd, '');
    }

    #[Depends('testCreateWalletWithPassword')]
    public function testChangeWalletPasswordInvalidPassword(): void
    {
        $this->expectException(InvalidOriginalPasswordException::class);
        self::$rpcClient->changeWalletPassword('', TestHelper::WALLET_PWD_2);
    }

    #[Depends('testCreateWalletWithPassword')]
    public function testChangeWalletPassword(): void
    {
        $this->expectNotToPerformAssertions();
        self::$rpcClient->changeWalletPassword(TestHelper::WALLET_PWD_1, TestHelper::WALLET_PWD_2);
        self::$rpcClient->openWallet(self::$walletWithPwd, TestHelper::WALLET_PWD_2);
    }

    public function testGenerateFromKeysWatchOnly(): void
    {
        $keyPair = new KeyPairHelper(TestHelper::WALLET_1_MNEMONIC);
        $result = self::$rpcClient->generateFromKeys(TestHelper::getRandomWalletName(), new Address($keyPair->getAddress()), $keyPair->getPrivateViewKey(), "");

        $this->assertSame('Watch-only wallet has been generated successfully.', $result->info);
    }

    /**
     * Create a second wallet
     * @return array{0: string, 1: GenerateFromKeysResponse}
     */
    public function testGenerateFromKeysWatchOnlyReturn(): array
    {
        $keyPair = new KeyPairHelper(TestHelper::WALLET_1_MNEMONIC);
        $filename = TestHelper::getRandomWalletName();
        $result = self::$rpcClient->generateFromKeys($filename, new Address($keyPair->getAddress()), $keyPair->getPrivateViewKey(), "");

        $this->assertSame('Watch-only wallet has been generated successfully.', $result->info);
        return [$filename, $result];
    }

    public function testGenerateFromKeysWithSpendKeyAndPassword(): GenerateFromKeysResponse
    {
        $keyPair = new KeyPairHelper(TestHelper::WALLET_2_MNEMONIC);
        $result = self::$rpcClient->generateFromKeys(TestHelper::getRandomWalletName(), new Address($keyPair->getAddress()), $keyPair->getPrivateViewKey(), TestHelper::WALLET_PWD_1, 0, $keyPair->getPrivateSpendKey(), false);

        $this->assertSame('Wallet has been generated successfully.', $result->info);
        return $result;
    }

    public function testGenerateFromKeysWithInvalidAddress(): void
    {
        try {
            $keyPair = new KeyPairHelper(TestHelper::WALLET_3_MNEMONIC);
            self::$rpcClient->generateFromKeys(TestHelper::getRandomWalletName(), new Address($keyPair->getTestnetAddress()), $keyPair->getPrivateViewKey(), '');
        } catch (HttpApiException $e) {
            $this->assertSame('Failed to parse public address', $e->getMessage());
        }
    }

    public function testGetAddressNoWalletFile(): void
    {
        $this->expectException(NoWalletFileException::class);
        self::$rpcClient->closeWallet();
        self::$rpcClient->getAddress(0);
    }

    #[Depends('testGenerateFromKeysWatchOnlyReturn')]
    public function testOpenWalletWithNoOrEmptyPassword(array $generateFromKeysResponse): void
    {
        $this->expectNotToPerformAssertions();
        self::$rpcClient->openWallet($generateFromKeysResponse[0]);
        self::$rpcClient->openWallet($generateFromKeysResponse[0], '');
    }

    #[Depends('testGenerateFromKeysWatchOnlyReturn')]
    public function testInvalidAccountIndex(array $generateFromKeysResponse): void
    {
        $this->expectException(AccountIndexOutOfBoundException::class);
        self::$rpcClient->getAddress(10);
    }

    #[Depends('testGenerateFromKeysWatchOnlyReturn')]
    public function testInvalidAddressIndex(array $generateFromKeysResponse): void
    {
        $this->expectException(AddressIndexOutOfBoundException::class);
        self::$rpcClient->getAddress(0, [10]);
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

    public function testCreateAccount(): CreateAccountResponse
    {
        $result = self::$rpcClient->createAccount('accountLabel');
        $this->assertGreaterThan(0, $result->accountIndex);
        return $result;
    }

    #[Depends('testCreateAccount')]
    public function testGetAccounts(CreateAccountResponse $createAccountResponse): void
    {
        $result = self::$rpcClient->getAccounts();
        $resultAddress = $result->subaddressAccounts[$createAccountResponse->accountIndex]->baseAddress;
        $this->assertEquals($createAccountResponse->address, $resultAddress);
    }

    public function testCreateAddress(): CreateAddressResponse
    {
        $walletName = TestHelper::getRandomWalletName();
        self::$rpcClient->createWallet($walletName, 'English', '');
        self::$rpcClient->openWallet($walletName);

        $createAddress = self::$rpcClient->createAddress(0);

        $this->assertSame(0, self::$rpcClient->getAddressIndex($createAddress->address)->index->major);
        $this->assertSame(1, self::$rpcClient->getAddressIndex($createAddress->address)->index->minor);

        return $createAddress;
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

    public function testCreateAddressInvalidAccountIndex(): void
    {
        $this->expectException(AccountIndexOutOfBoundException::class);
        self::$rpcClient->createAddress(999);
    }

    public function testGetAddressIndexInvalidAddressException(): void
    {
        $this->expectException(InvalidAddressException::class);
        self::$rpcClient->getAddressIndex(new Address(TestHelper::TESTNET_ADDRESS_1));
    }

    public function testGetAddressIndexException(): void
    {
        $this->expectException(AddressNotInWalletException::class);
        self::$rpcClient->getAddressIndex(new Address(TestHelper::MAINNET_ADDRESS_1));
    }

    #[Depends('testCreateAddress')]
    public function testLabelAddress(CreateAddressResponse $createdAddress): void
    {
        $label = 'test label';

        self::$rpcClient->labelAddress(new SubAddressIndex(0, $createdAddress->addressIndex), $label);
        $this->assertSame($label, self::$rpcClient->getAddress(0, [$createdAddress->addressIndex])->addresses[0]->label);
    }

    public function testLabelAddressInvalidAccountIndex(): void
    {
        $this->expectException(AccountIndexOutOfBoundException::class);
        self::$rpcClient->labelAddress(new SubAddressIndex(999, 0), '');
    }

    public function testLabelAddressInvalidAddressIndex(): void
    {
        $this->expectException(AddressIndexOutOfBoundException::class);
        self::$rpcClient->labelAddress(new SubAddressIndex(0, 999), '');
    }

    public function testLabelAccount(): void
    {
        $label = 'test account label';

        self::$rpcClient->labelAccount(0, $label);
        $this->assertSame($label, self::$rpcClient->getAccounts('')->subaddressAccounts[0]->label);
    }

    public function testLabelAccountInvalidAccountIndex(): void
    {
        $this->expectException(AccountIndexOutOfBoundException::class);
        self::$rpcClient->labelAccount(999, '');
    }

    public function testValidateAddress(): void
    {
        $result = self::$rpcClient->validateAddress(new Address(TestHelper::MAINNET_ADDRESS_1));
        $this->assertSame(true, $result->valid);
        $this->assertSame(NetType::MAINNET, $result->nettype);
    }

    public function testValidateAddressTestnet(): void
    {
        $result = self::$rpcClient->validateAddress(new Address(TestHelper::TESTNET_ADDRESS_1), true);
        $this->assertSame(true, $result->valid);
        $this->assertSame(NetType::TESTNET, $result->nettype);
    }

    public function testValidateAddressInvalid(): void
    {
        $result = self::$rpcClient->validateAddress(new Address(TestHelper::TESTNET_ADDRESS_1));
        $this->assertSame(false, $result->valid);
    }

    public function testTagAccounts(): void
    {
        $this->expectNotToPerformAssertions();
        self::$rpcClient->tagAccounts(self::ACCOUNT_TAG, self::DEFAULT_ACCOUNT_INDEX);
    }

    public function testTagAccountsInvalid(): void
    {
        $this->expectException(AccountIndexOutOfBoundException::class);
        self::$rpcClient->tagAccounts('', 999);
    }

    public function testGetAccountsByTagFailure(): void
    {
        $this->expectException(TagNotFoundException::class);
        self::$rpcClient->getAccounts('invalidTag');
    }

    #[Depends('testTagAccounts')]
    public function testSetAccountTagDescription(): void
    {
        $this->expectNotToPerformAssertions();
        self::$rpcClient->setAccountTagDescription(self::ACCOUNT_TAG, self::ACCOUNT_TAG_DESCRIPTION);
    }

    #[Depends('testTagAccounts')]
    public function testGetAccountsByTag(): void
    {
        $result = self::$rpcClient->getAccounts(self::ACCOUNT_TAG);
        $this->assertSame(self::DEFAULT_ACCOUNT_INDEX, $result->subaddressAccounts[0]->accountIndex);
    }

    #[Depends('testSetAccountTagDescription')]
    public function testGetAccountTags(): void
    {
        $result = self::$rpcClient->getAccountTags();
        $this->assertSame(self::ACCOUNT_TAG, $result->accountTags[0]->tag);
        $this->assertSame(self::DEFAULT_ACCOUNT_INDEX, $result->accountTags[0]->accounts[0]);
        $this->assertSame(self::ACCOUNT_TAG_DESCRIPTION, $result->accountTags[0]->label);
    }

    #[Depends('testGetAccountTags')]
    public function testUntagAccounts(): void
    {
        self::$rpcClient->untagAccounts(0);
        $result = self::$rpcClient->getAccountTags();
        $this->assertTrue(empty($result->accountTags));
    }

    public function testGetHeight(): void
    {
        $this->assertSame(1, self::$rpcClient->getHeight()->height);
    }

    public function testStore(): void
    {
        $this->expectNotToPerformAssertions();
        self::$rpcClient->store();
    }

    public function testGetAttributeError(): void
    {
        $this->expectException(AttributeNotFoundException::class);
        self::$rpcClient->getAttribute('nonexistingattribute');
    }

    public function testSetAttribute(): void
    {
        $this->expectNotToPerformAssertions();
        $result = self::$rpcClient->setAttribute('attribute_key', 'attribute_value');
    }

    #[Depends('testSetAttribute')]
    public function testGetAttribute(): void
    {
        $result = self::$rpcClient->getAttribute('attribute_key');
        $this->assertSame('attribute_value', $result->value);
    }

    public function testMakeUri(): void
    {
        $expected = 'monero:43ZdL1Rm65iTPMCwxaHWPWHS39F3rVjM5a3EN78fSYc3VwCpZ7XTreJg98FU5EmMJi1XE6bjxXH9EMjsF7KBias54xAJXRm?tx_amount=1.100000000000&recipient_name=Barolo&tx_description=Nebbiolo';
        $result = self::$rpcClient->makeUri(new Address(TestHelper::MAINNET_ADDRESS_1), Amount::fromXmr('1.1'), null, 'Barolo', 'Nebbiolo');
        $this->assertSame($expected, $result->uri);
    }

    public function testParseUri(): void
    {
        $uri = 'monero:43ZdL1Rm65iTPMCwxaHWPWHS39F3rVjM5a3EN78fSYc3VwCpZ7XTreJg98FU5EmMJi1XE6bjxXH9EMjsF7KBias54xAJXRm?tx_amount=0.000000000001&recipient_name=Barolo&tx_description=Nebbiolo';
        $result = self::$rpcClient->parseUri($uri);
        $this->assertSame(TestHelper::MAINNET_ADDRESS_1, (string) $result->uri->address);
        $this->assertSame(1, (int) $result->uri->amount->getAmount());
        $this->assertSame('Barolo', $result->uri->recipientName);
        $this->assertSame('Nebbiolo', $result->uri->txDescription);
    }

    public function testAddAddressBook(): int
    {
        $result = self::$rpcClient->addAddressBook(new Address(TestHelper::MAINNET_ADDRESS_1), self::ADDRESS_BOOK_DESCRIPTION);
        $this->assertGreaterThanOrEqual(0, $result->index);

        return $result->index;
    }

    #[Depends('testAddAddressBook')]
    public function testGetAddressBook(int $index): void
    {
        $result = self::$rpcClient->getAddressBook();
        $this->assertSame($result->entries[0]->description, self::ADDRESS_BOOK_DESCRIPTION);
    }

    #[Depends('testAddAddressBook')]
    public function testGetAddressBookByIndex(int $index): void
    {
        $result = self::$rpcClient->getAddressBook([$index]);
        $this->assertSame($result->entries[0]->description, self::ADDRESS_BOOK_DESCRIPTION);
    }

    #[Depends('testAddAddressBook')]
    public function testEditAddressBookByIndex(int $index): void
    {
        self::$rpcClient->editAddressBook($index, false, true, null, self::ADDRESS_BOOK_DESCRIPTION_EDIT);
        $result = self::$rpcClient->getAddressBook([$index]);
        $this->assertSame($result->entries[0]->description, self::ADDRESS_BOOK_DESCRIPTION_EDIT);
    }

    #[Depends('testAddAddressBook')]
    public function testDeleteAddressBookByIndex(int $index): int
    {
        $this->expectNotToPerformAssertions();
        self::$rpcClient->deleteAddressBook($index);
        return $index;
    }

    #[Depends('testDeleteAddressBookByIndex')]
    public function testGetAddressBookByIndexError(int $index): void
    {
        $this->expectException(IndexOutOfRangeException::class);
        self::$rpcClient->getAddressBook([$index]);
    }
    public function testMakeIntegratedAddressErrorInvalidPaymentId(): void
    {
        $this->expectException(InvalidPaymentIdException::class);
        self::$rpcClient->makeIntegratedAddress(TestHelper::MAINNET_ADDRESS_1, 'test');
    }

    public function testMakeIntegratedAddressErrorInvalidAddress(): void
    {
        $this->expectException(InvalidAddressException::class);
        self::$rpcClient->makeIntegratedAddress(TestHelper::MAINNET_ADDRESS_1.'error', self::PAYMENT_ID_1);
    }

    public function testMakeIntegratedAddress(): string
    {
        $result = self::$rpcClient->makeIntegratedAddress(TestHelper::MAINNET_ADDRESS_1, self::PAYMENT_ID_1);
        $this->assertSame(self::PAYMENT_ID_1, $result->paymentId);
        $this->assertSame('4DGJLpFFhMETPMCwxaHWPWHS39F3rVjM5a3EN78fSYc3VwCpZ7XTreJg98FU5EmMJi1XE6bjxXH9EMjsF7KBias56rb3XqNyev8U3xFDyA', $result->integratedAddress);
        return $result->integratedAddress;
    }

    #[Depends('testMakeIntegratedAddress')]
    public function splitIntegratedAddress(string $integratedAddress): void
    {
        $result = self::$rpcClient->splitIntegratedAddress($integratedAddress);
        $this->assertSame(TestHelper::MAINNET_ADDRESS_1, $result->standardAddress);
        $this->assertSame(self::PAYMENT_ID_1, $result->paymentId);
    }

    public function testRestoreDeterministicWallet(): string
    {
        $result = self::$rpcClient->restoreDeterministicWallet(TestHelper::getRandomWalletName(), '', TestHelper::WALLET_1_MNEMONIC);
        $this->assertEquals(new Address(TestHelper::MAINNET_ADDRESS_1), $result->address);
        $this->assertSame('Wallet has been restored successfully.', $result->info);
        return $result->seed;
    }

    #[Depends('testRestoreDeterministicWallet')]
    public function testQueryKey(string $seed): void
    {
        $keyPair = new KeyPairHelper($seed);
        $result = self::$rpcClient->queryKey(QueryKeyType::VIEW_KEY);
        $this->assertSame($keyPair->getPrivateViewKey(), $result->key);

        $result = self::$rpcClient->queryKey(QueryKeyType::SPEND_KEY);
        $this->assertSame($keyPair->getPrivateSpendKey(), $result->key);

        $result = self::$rpcClient->queryKey(QueryKeyType::MNEMONIC);
        $this->assertSame($seed, $result->key);
    }
}
