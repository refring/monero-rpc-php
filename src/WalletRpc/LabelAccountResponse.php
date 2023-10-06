<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Label an account.
 */
class LabelAccountResponse
{
    use JsonSerializeBigInt;
}
