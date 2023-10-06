<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Sign a string.
 */
class SignResponse
{
    use JsonSerializeBigInt;

    /**
     * Signature generated against the "data" and the account public address.
     */
    #[Json]
    public string $signature;
}
