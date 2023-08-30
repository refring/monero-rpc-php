<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Relay a list of transaction IDs.Alias: *None*.
 */
class RelayTxResponse
{
	use JsonSerialize;

	/**
	 * General RPC error code. "OK" means everything looks good.
	 */
	#[Json]
	public string $status;
}
