<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get transaction signature to prove it.Alias: *None*.
 */
class GetTxProofResponse
{
    use JsonSerialize;

    /**
     * transaction signature.
     */
    #[Json]
    public string $signature;
}
