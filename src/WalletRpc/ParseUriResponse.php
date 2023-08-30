<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Parse a payment URI to get payment information.Alias: *None*.
 */
class ParseUriResponse
{
	use JsonSerialize;

	/**
	 * JSON object containing payment information:
	 */
	#[Json]
	public \RefRing\MoneroRpcPhp\Model\PaymentUri $uri;
}
