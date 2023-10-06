<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Set arbitrary attribute.
 */
class SetAttributeResponse
{
    use JsonSerializeBigInt;
}
