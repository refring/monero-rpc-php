<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Check if a wallet is a multisig one.Alias: *None*.
 */
class IsMultisigResponse
{
    use JsonSerialize;

    /**
     * States if the wallet is multisig
     */
    #[Json]
    public bool $multisig;

    #[Json]
    public bool $ready;

    /**
     * Amount of signature needed to sign a transfer.
     */
    #[Json]
    public int $threshold;

    /**
     * Total amount of signature in the multisig wallet.
     */
    #[Json]
    public int $total;
}
