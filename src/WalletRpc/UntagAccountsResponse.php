<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\JsonSerialize;

/**
 * Remove filtering tag from a list of accounts.Alias: *None*.
 */
class UntagAccountsResponse
{
    use JsonSerialize;
}
