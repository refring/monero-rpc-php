<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Generate a signature to prove of an available amount in a wallet.Alias: *None*.
 */
class GetReserveProofResponse
{
    use JsonSerialize;

    /**
     * reserve signature.
     */
    #[Json]
    public string $signature;
}
