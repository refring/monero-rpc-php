<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Generate a signature to prove a spend. Unlike proving a transaction, it does not requires the destination public address.
 */
class GetSpendProofResponse
{
    use JsonSerializeBigInt;

    /**
     * spend signature.
     */
    #[Json]
    public string $signature;
}
