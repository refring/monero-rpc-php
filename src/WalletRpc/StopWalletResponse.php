<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Store the current state of any open wallet and exit the monero-wallet-rpc process.
 */
class StopWalletResponse
{
    use JsonSerializeBigInt;
}
