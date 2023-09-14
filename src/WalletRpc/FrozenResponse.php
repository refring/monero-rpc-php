<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Checks whether a given output is currently frozen by key image
 */
class FrozenResponse
{
    use JsonSerialize;

    #[Json]
    public bool $frozen;
}
