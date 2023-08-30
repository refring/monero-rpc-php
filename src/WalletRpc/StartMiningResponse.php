<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\JsonSerialize;

/**
 * Start mining in the Monero daemon.Alias: *None*.
 */
class StartMiningResponse
{
    use JsonSerialize;
}
