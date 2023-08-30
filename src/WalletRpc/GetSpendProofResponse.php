<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Generate a signature to prove a spend. Unlike proving a transaction, it does not requires the destination public address.Alias: *None*.
 */
class GetSpendProofResponse
{
    use JsonSerialize;

    /**
     * spend signature.
     */
    #[Json]
    public string $signature;
}
