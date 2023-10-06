<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Close the currently opened wallet, after trying to save it.
 */
class CloseWalletResponse
{
    use JsonSerializeBigInt;
}
