<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get attribute value by name.Alias: *None*.
 */
class GetAttributeResponse
{
	use JsonSerialize;

	/**
	 * attribute value
	 */
	#[Json]
	public string $value;
}
