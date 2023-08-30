<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Set whether and how often to automatically refresh the current wallet.
 */
class AutoRefreshResponse
{
	use JsonSerialize;
}
