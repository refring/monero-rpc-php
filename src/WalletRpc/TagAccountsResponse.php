<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Apply a filtering tag to a list of accounts.
 */
class TagAccountsResponse
{
    use JsonSerializeBigInt;
}
