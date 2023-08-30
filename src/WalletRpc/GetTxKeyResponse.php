<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get transaction secret key from transaction id.Alias: *None*.
 */
class GetTxKeyResponse
{
	use JsonSerialize;

	/**
	 * transaction secret key.
	 */
	#[Json('tx_key')]
	public string $txKey;
}
