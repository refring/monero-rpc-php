<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\integration;

use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\ClientBuilder;
use RefRing\MoneroRpcPhp\Exception\AlreadyIntegratedAddressException;
use RefRing\MoneroRpcPhp\Exception\InvalidAddressException;
use RefRing\MoneroRpcPhp\Exception\InvalidPaymentIdException;
use RefRing\MoneroRpcPhp\Model\Address;
use RefRing\MoneroRpcPhp\Tests\TestHelper;
use RefRing\MoneroRpcPhp\WalletRpcClient;

class IntegratedAddressTest extends TestCase
{
    private const SEED = 'velvet lymph giddy number token physics poetry unquoted nibs useful sabotage limits benches lifestyle eden nitrogen anvil fewest avoid batch vials washing fences goat unquoted';
    private const WALLET_ADDRESS = '42ey1afDFnn4886T7196doS9GPMzexD9gXpsZJDwVjeRVdFCSoHnv7KPbBeGpzJBzHRCAs9UxqeoyFQMYbqSWYTfJJQAWDm';
    private const PAYMENT_ID_1 = '0123456789abcdef';
    private const INTEGRATED_ADDRESS_1 = '4CMe2PUhs4J4886T7196doS9GPMzexD9gXpsZJDwVjeRVdFCSoHnv7KPbBeGpzJBzHRCAs9UxqeoyFQMYbqSWYTfSbLRB61BQVATzerHGj';

    private const DIFFERENT_ADDRESS = '46r4nYSevkfBUMhuykdK3gQ98XDqDTYW1hNLaXNvjpsJaSbNtdXh1sKMsdVgqkaihChAzEy29zEDPMR3NHQvGoZCLGwTerK';
    private const PAYMENT_ID_2 = '1122334455667788';
    private const INTEGRATED_ADDRESS_2 = '4GYjoMG9Y2BBUMhuykdK3gQ98XDqDTYW1hNLaXNvjpsJaSbNtdXh1sKMsdVgqkaihChAzEy29zEDPMR3NHQvGoZCVSs1ZojwrDCGS5rUuo';

    private static WalletRpcClient $rpcClient;

    public static function setUpBeforeClass(): void
    {
        self::$rpcClient = (new ClientBuilder(getenv('WALLET_RPC_URL')))
            ->buildWalletClient();

        // Close any open wallet, then restore the test wallet
        try {
            self::$rpcClient->closeWallet();
        } catch (\Throwable) {
            // Ignore if no wallet is loaded
        }

        $result = self::$rpcClient->restoreDeterministicWallet(TestHelper::getRandomWalletName(), '', self::SEED);
        self::assertSame(self::WALLET_ADDRESS, (string) $result->address);
        self::assertSame(self::SEED, $result->seed);
    }

    public function testMakeIntegratedAddressWithLocalAddress(): void
    {
        $result = self::$rpcClient->makeIntegratedAddress(null, self::PAYMENT_ID_1);

        $this->assertSame(self::INTEGRATED_ADDRESS_1, $result->integratedAddress);
        $this->assertSame(self::PAYMENT_ID_1, $result->paymentId);
    }

    public function testSplitIntegratedAddressLocal(): void
    {
        $result = self::$rpcClient->splitIntegratedAddress(self::INTEGRATED_ADDRESS_1);

        $this->assertSame(self::WALLET_ADDRESS, (string) $result->standardAddress);
        $this->assertSame(self::PAYMENT_ID_1, $result->paymentId);
    }

    public function testMakeIntegratedAddressWithDifferentAddress(): void
    {
        $result = self::$rpcClient->makeIntegratedAddress(self::DIFFERENT_ADDRESS, self::PAYMENT_ID_2);

        $this->assertSame(self::INTEGRATED_ADDRESS_2, $result->integratedAddress);
        $this->assertSame(self::PAYMENT_ID_2, $result->paymentId);
    }

    public function testSplitIntegratedAddressDifferent(): void
    {
        $result = self::$rpcClient->splitIntegratedAddress(self::INTEGRATED_ADDRESS_2);

        $this->assertSame(self::DIFFERENT_ADDRESS, (string) $result->standardAddress);
        $this->assertSame(self::PAYMENT_ID_2, $result->paymentId);
    }

    public function testBadPaymentId(): void
    {
        $this->expectException(InvalidPaymentIdException::class);
        self::$rpcClient->makeIntegratedAddress(self::DIFFERENT_ADDRESS, '11223344556677880');

        $this->expectException(InvalidPaymentIdException::class);
        self::$rpcClient->makeIntegratedAddress(self::DIFFERENT_ADDRESS, '112233445566778');

        $this->expectException(InvalidPaymentIdException::class);
        self::$rpcClient->makeIntegratedAddress(self::DIFFERENT_ADDRESS, '112233445566778g');

        $this->expectException(InvalidPaymentIdException::class);
        self::$rpcClient->makeIntegratedAddress(self::DIFFERENT_ADDRESS, '1122334455667788112233445566778811223344556677881122334455667788');
    }

    public function testMakeIntegratedAddressWithBadStandardAddress(): void
    {
        $this->expectException(InvalidAddressException::class);
        self::$rpcClient->makeIntegratedAddress('46r4nYSevkfBUMhuykdK3gQ98XDqDTYW1hNLaXNvjpsJaSbNtdXh1sKMsdVgqkaihChAzEy29zEDPMR3NHQvGoZCLGwTerr', self::PAYMENT_ID_2);
    }

    public function testMakeIntegratedAddressWithIntegratedAddressAsStandardAddress(): void
    {
        $this->expectException(AlreadyIntegratedAddressException::class);
        // Using an integrated address where a standard address is expected
        self::$rpcClient->makeIntegratedAddress(self::INTEGRATED_ADDRESS_2, self::PAYMENT_ID_2);
    }
}
