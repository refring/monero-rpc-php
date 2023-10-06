<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Start mining in the Monero daemon.
 */
class StartMiningResponse
{
    use JsonSerializeBigInt;
}
