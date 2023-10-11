<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Set description for an account tag.
 */
class SetAccountTagDescriptionResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
