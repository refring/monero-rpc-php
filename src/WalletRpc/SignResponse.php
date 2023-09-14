<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Sign a string.
 */
class SignResponse
{
    use JsonSerialize;

    /**
     * Signature generated against the "data" and the account public address.
     */
    #[Json]
    public string $signature;
}
