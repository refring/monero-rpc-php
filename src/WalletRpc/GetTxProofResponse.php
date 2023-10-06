<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Get transaction signature to prove it.
 */
class GetTxProofResponse
{
    use JsonSerializeBigInt;

    /**
     * transaction signature.
     */
    #[Json]
    public string $signature;
}
