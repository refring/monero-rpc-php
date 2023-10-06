<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Turn this wallet into a multisig wallet, extra step for N-1/N wallets.
 */
class FinalizeMultisigResponse
{
    use JsonSerializeBigInt;
}
