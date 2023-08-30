<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\JsonSerialize;

/**
 * Store the current state of any open wallet and exit the monero-wallet-rpc process.Alias: *None*.
 */
class StopWalletResponse
{
    use JsonSerialize;
}
