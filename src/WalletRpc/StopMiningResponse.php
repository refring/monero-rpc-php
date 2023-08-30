<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Stop mining in the Monero daemon.Alias: *None*.
 */
class StopMiningResponse
{
	use JsonSerialize;
}
