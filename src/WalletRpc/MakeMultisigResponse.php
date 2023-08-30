<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Make a wallet multisig by importing peers multisig string.Alias: *None*.
 */
class MakeMultisigResponse
{
    use JsonSerialize;

    /**
     * multisig wallet address.
     */
    #[Json]
    public string $address;

    /**
     * Multisig string to share with peers to create the multisig wallet (extra step for N-1/N wallets).
     */
    #[Json('multisig_info')]
    public string $multisigInfo;
}
