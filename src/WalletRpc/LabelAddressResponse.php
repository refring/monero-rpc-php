<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Label an address.
 */
class LabelAddressResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
