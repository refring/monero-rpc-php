<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Checks whether a given output is currently frozen by key image
 */
class FrozenResponse
{
    use JsonSerializeBigInt;

    #[Json]
    public bool $frozen;
}
