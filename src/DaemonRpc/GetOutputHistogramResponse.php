<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\Histogram;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get a histogram of output amounts. For all amounts (possibly filtered by parameters), gives the number of outputs on the chain for that amount.RingCT outputs counts as 0 amount.
 */
class GetOutputHistogramResponse
{
	use JsonSerialize;

	/**
	 * If payment for RPC is enabled, the number of credits available to the requesting client. Otherwise, 0.
	 */
	#[Json]
	public int $credits;

	/** @var Histogram[] */
	#[Json]
	public array $histogram;

	/**
	 * General RPC error code. "OK" means everything looks good.
	 */
	#[Json]
	public string $status;

	/**
	 * If payment for RPC is enabled, the hash of the highest block in the chain. Otherwise, empty.
	 */
	#[Json('top_hash')]
	public string $topHash;

	/**
	 * States if the result is obtained using the bootstrap mode, and is therefore not trusted (`true`), or when the daemon is fully synced and thus handles the RPC locally (`false`)
	 */
	#[Json]
	public bool $untrusted;
}
