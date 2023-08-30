<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Verify a signature on a string.Alias: *None*.
 */
class VerifyResponse
{
    use JsonSerialize;

    #[Json]
    public bool $good;
}
