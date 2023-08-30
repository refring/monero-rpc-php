<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Relay a transaction previously created with `"do_not_relay":true`.Alias: *None*.
 */
class RelayTxResponse
{
	use JsonSerialize;

	/**
	 * String for the publically searchable transaction hash.
	 */
	#[Json('tx_hash')]
	public string $txHash;
}
