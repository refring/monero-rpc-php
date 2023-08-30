<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Submit a mined block to the network.Alias: *submitblock*.
 */
class SubmitBlockResponse
{
	use JsonSerialize;

	/**
	 * Block submit status.
	 */
	#[Json]
	public string $status;
}
