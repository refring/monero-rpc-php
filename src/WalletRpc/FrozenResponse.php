<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Checks whether a given output is currently frozen by key image
 */
class FrozenResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json]
    public bool $frozen;
}
