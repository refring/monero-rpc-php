<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Check a transaction in the blockchain with its secret key.Alias: *None*.
 */
class CheckTxKeyResponse
{
	use JsonSerialize;

	/**
	 * Number of block mined after the one with the transaction.
	 */
	#[Json]
	public int $confirmations;

	/**
	 * States if the transaction is still in pool or has been added to a block.
	 */
	#[Json('in_pool')]
	public bool $inPool;

	/**
	 * Amount of the transaction.
	 */
	#[Json]
	public int $received;
}
