<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Get RPC version Major & Minor integer-format, where Major is the first 16 bits and Minor the last 16 bits.
 */
class GetVersionResponse
{
    use JsonSerializeBigInt;

    /**
     * RPC version, formatted with `Major * 2^16 + Minor` (Major encoded over the first 16 bits, and Minor over the last 16 bits).
     */
    #[Json]
    public int $version;
}
