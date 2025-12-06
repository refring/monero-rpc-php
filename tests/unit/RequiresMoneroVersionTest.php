<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\unit;

use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\Tests\Attribute\RequiresMoneroVersion;

final class RequiresMoneroVersionTest extends TestCase
{
    public function testAttributeInstantiation(): void
    {
        $attr = new RequiresMoneroVersion('0.18.4.0');
        $this->assertSame('0.18.4.0', $attr->minVersion);
        $this->assertNull($attr->maxVersion);
    }

    public function testAttributeInstantiationWithMax(): void
    {
        $attr = new RequiresMoneroVersion('0.18.0.0', '0.19.0.0');
        $this->assertSame('0.18.0.0', $attr->minVersion);
        $this->assertSame('0.19.0.0', $attr->maxVersion);
    }

    public function testVersionCompareWorks(): void
    {
        // Verify PHP's version_compare works correctly with Monero version strings
        $this->assertSame(-1, version_compare('0.18.3.0', '0.18.4.0'));
        $this->assertSame(0, version_compare('0.18.4.0', '0.18.4.0'));
        $this->assertSame(1, version_compare('0.18.5.0', '0.18.4.0'));
        $this->assertSame(-1, version_compare('0.17.3.2', '0.18.4.0'));
        $this->assertSame(1, version_compare('0.19.0.0', '0.18.4.0'));
    }
}
