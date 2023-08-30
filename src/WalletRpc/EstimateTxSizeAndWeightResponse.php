<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Alias: *None*.
 */
class EstimateTxSizeAndWeightResponse
{
	use JsonSerialize;

	#[Json]
	public int $size;

	#[Json]
	public int $weight;
}
