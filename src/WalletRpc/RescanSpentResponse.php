<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Rescan the blockchain for spent outputs.
 */
class RescanSpentResponse
{
    use JsonSerializeBigInt;
}
