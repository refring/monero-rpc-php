<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Apply a filtering tag to a list of accounts.Alias: *None*.
 */
class TagAccountsResponse
{
	use JsonSerialize;
}
