<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Change a wallet password.
 */
class ChangeWalletPasswordResponse
{
    use JsonSerializeBigInt;
}
