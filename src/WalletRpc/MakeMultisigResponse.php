<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Address;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Make a wallet multisig by importing peers multisig string.
 */
class MakeMultisigResponse
{
    use JsonSerializeBigInt;

    /**
     * multisig wallet address.
     */
    #[Json]
    public Address $address;

    /**
     * Multisig string to share with peers to create the multisig wallet (extra step for N-1/N wallets).
     */
    #[Json('multisig_info')]
    public string $multisigInfo;
}
