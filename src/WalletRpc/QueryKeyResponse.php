<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Return the spend or view private key.Alias: *None*.
 */
class QueryKeyResponse
{
	use JsonSerialize;

	/**
	 * The view key will be hex encoded, while the mnemonic will be a string of words.
	 */
	#[Json]
	public string $key;
}
