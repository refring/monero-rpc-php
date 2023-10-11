<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get transaction signature to prove it.
 */
class GetTxProofResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * transaction signature.
     */
    #[Json]
    public string $signature;
}
