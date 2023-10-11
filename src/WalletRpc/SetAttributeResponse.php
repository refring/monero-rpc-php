<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Set arbitrary attribute.
 */
class SetAttributeResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
