<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Give the node current versionAlias: *None*.
 */
class GetVersionResponse
{
	use JsonSerialize;

	/**
	 * States if the daemon software version corresponds to an official tagged release (`true`), or not (`false`)
	 */
	#[Json]
	public bool $release;

	/**
	 * General RPC error code. "OK" means everything looks good.
	 */
	#[Json]
	public string $status;

	/**
	 * States if the result is obtained using the bootstrap mode, and is therefore not trusted (`true`), or when the daemon is fully synced and thus handles the RPC locally (`false`)
	 */
	#[Json]
	public bool $untrusted;

	#[Json]
	public int $version;
}
