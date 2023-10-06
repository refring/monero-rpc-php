<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Save the wallet file.
 */
class StoreResponse
{
    use JsonSerializeBigInt;
}
