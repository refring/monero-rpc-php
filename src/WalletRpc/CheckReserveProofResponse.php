<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Proves a wallet has a disposable reserve using a signature.Alias: *None*.
 */
class CheckReserveProofResponse
{
    use JsonSerialize;

    /**
     * States if the inputs proves the reserve.
     */
    #[Json]
    public bool $good;

    /**
     * Amount (in @atomic-units) of the total that has been spent.
     */
    #[Json]
    public int $spent;

    /**
     * Total amount (in @atomic-units) of the reserve that was proven.
     */
    #[Json]
    public int $total;
}
