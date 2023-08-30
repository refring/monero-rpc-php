<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Sign a transaction in multisig.Alias: *None*.
 */
class SignMultisigResponse
{
	use JsonSerialize;

	/**
	 * Multisig transaction in hex format.
	 */
	#[Json('tx_data_hex')]
	public string $txDataHex;

	/**
	 * List of transaction Hash.
     * @var string[]
	 */
	#[Json('tx_hash_list')]
	public array $txHashList;
}
