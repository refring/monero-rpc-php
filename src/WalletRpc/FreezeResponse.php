<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Freeze a single output by key image so it will not be used
 */
class FreezeResponse
{
    use JsonSerializeBigInt;
}
