<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Close the currently opened wallet, after trying to save it.Alias: *None*.
 */
class CloseWalletResponse
{
	use JsonSerialize;
}
