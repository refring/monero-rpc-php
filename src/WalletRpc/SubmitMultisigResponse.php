<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Submit a signed multisig transaction.Alias: *None*.
 */
class SubmitMultisigResponse
{
	use JsonSerialize;

	/**
	 * List of transaction Hash.
     * @var string[]
	 */
	#[Json('tx_hash_list')]
	public array $txHashList;
}
