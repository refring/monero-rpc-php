<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Return the spend or view private key.
 */
class QueryKeyResponse
{
    use JsonSerializeBigInt;

    /**
     * The view key will be hex encoded, while the mnemonic will be a string of words.
     */
    #[Json]
    public string $key;
}
