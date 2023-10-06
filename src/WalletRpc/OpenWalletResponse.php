<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Open a wallet. You need to have set the argument "--wallet-dir" when launching monero-wallet-rpc to make this work.
 */
class OpenWalletResponse
{
    use JsonSerializeBigInt;
}
