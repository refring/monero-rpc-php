<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Connect the RPC server to a Monero daemon.
 */
class SetDaemonResponse
{
    use JsonSerializeBigInt;
}
