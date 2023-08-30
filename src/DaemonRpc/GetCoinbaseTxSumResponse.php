<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get the coinbase amount and the fees amount for n last blocks starting at particular heightAlias: *None*.
 */
class GetCoinbaseTxSumResponse
{
	use JsonSerialize;

	/**
	 * If payment for RPC is enabled, the number of credits available to the requesting client. Otherwise, 0.
	 */
	#[Json]
	public int $credits;

	/**
	 * Least significant 64 bits for 128 bit integer representing the sum of coinbase rewards in @atomic-units. (See src/rpc/core_rpc_server.cpp store_128)
	 */
	#[Json('emission_amount')]
	public int $emissionAmount;

	/**
	 * Most significant 64 bits for 128 bit integer representing the sum of coinbase rewards in @atomic-units
	 */
	#[Json('emission_amount_top64')]
	public int $emissionAmountTop64;

	/**
	 * Most significant 64 bits for 128 bit integer representing the sum of fees in @atomic-units.
	 */
	#[Json('fee_amount')]
	public int $feeAmount;

	/**
	 * Most significant 64 bits for 128 bit integer representing the sum of fees in @atomic-units.
	 */
	#[Json('fee_amount_top64')]
	public int $feeAmountTop64;

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

	/**
	 * Sum of coinbase rewards in @atomic-units.
	 */
	#[Json('wide_emission_amount')]
	public string $wideEmissionAmount;

	/**
	 * Sum of fees in @atomic-units.
	 */
	#[Json('wide_fee_amount')]
	public string $wideFeeAmount;
}
