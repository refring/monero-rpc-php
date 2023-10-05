<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\unit;

use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\Monero\Amount;

class AmountTest extends TestCase
{
    public function testAmount()
    {
        $amount = new Amount((string) Amount::MONERO);
        $this->assertSame("1000000000000", $amount->getAmount());
    }

    public function testToXmr()
    {
        $amount = new Amount((string) Amount::MONERO);
        $this->assertSame("1.000000000000", $amount->toXmr(false));
    }

    public function testToXmrStrippedZeros()
    {
        $amount = new Amount((string) Amount::MONERO);
        $this->assertSame("1", $amount->toXmr());
    }

    public function testAmountFromXmr()
    {
        $amount = Amount::fromXmr("2.555");
        $this->assertSame("2555000000000", $amount->getAmount());
    }

    public function testXmrFromXmr()
    {
        $amount = Amount::fromXmr("2.555");
        $this->assertSame("2.555000000000", $amount->toXmr(false));
    }

    public function testXmrFromXmrStrippedZeros()
    {
        $amount = Amount::fromXmr("2.555");
        $this->assertSame("2.555", $amount->toXmr());
    }

    public function testFromXmrOverflow()
    {
        $amount = Amount::fromXmr("1.1231231231231");
        $this->assertSame("1.123123123123", $amount->toXmr());
    }
}
