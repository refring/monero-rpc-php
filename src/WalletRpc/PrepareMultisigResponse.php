<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Prepare a wallet for multisig by generating a multisig string to share with peers.
 */
class PrepareMultisigResponse
{
    use JsonSerializeBigInt;

    /**
     * Multisig string to share with peers to create the multisig wallet.
     */
    #[Json('multisig_info')]
    public string $multisigInfo;
}
