<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Connect the RPC server to a Monero daemon.Alias: *None*.
 */
class SetDaemonResponse
{
	use JsonSerialize;
}
