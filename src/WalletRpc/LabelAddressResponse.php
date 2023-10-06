<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Label an address.
 */
class LabelAddressResponse
{
    use JsonSerializeBigInt;
}
