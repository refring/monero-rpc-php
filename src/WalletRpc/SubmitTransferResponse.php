<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Submit a previously signed transaction on a read-only wallet (in cold-signing process).Alias: *None*.
 */
class SubmitTransferResponse
{
	use JsonSerialize;

	/**
	 * array of string. The tx hashes of every transaction.
     * @var string[]
	 */
	#[Json('tx_hash_list')]
	public array $txHashList;
}
