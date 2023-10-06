<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Generate a signature to prove of an available amount in a wallet.
 */
class GetReserveProofResponse
{
    use JsonSerializeBigInt;

    /**
     * reserve signature.
     */
    #[Json]
    public string $signature;
}
