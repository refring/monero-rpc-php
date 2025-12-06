<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\Attribute;

use Attribute;

/**
 * Mark a test method as requiring a specific Monero daemon version.
 *
 * The test will be skipped if the daemon version is below the minimum
 * or above the maximum (if specified).
 *
 * Version format: "0.18.4.0" (as returned by getInfo()->version)
 */
#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS)]
final class RequiresMoneroVersion
{
    public function __construct(
        public readonly string $minVersion,
        public readonly ?string $maxVersion = null,
    ) {
    }
}
