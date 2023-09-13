<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Address;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Turn this wallet into a multisig wallet, extra step for N-1/N wallets.Alias: *None*.
 */
class FinalizeMultisigResponse
{
    use JsonSerialize;

    /**
     * multisig wallet address.
     */
    #[Json]
    public Address $address;
}
