<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Stop mining in the Monero daemon.
 */
class StopMiningResponse
{
    use JsonSerializeBigInt;
}
