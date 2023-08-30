<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Ban another node by IP.Alias: *None*.
 */
class SetBansResponse
{
	use JsonSerialize;

	/**
	 * General RPC error code. "OK" means everything looks good.
	 */
	#[Json]
	public string $status;

    #[Json]
    public bool $untrusted;
}
