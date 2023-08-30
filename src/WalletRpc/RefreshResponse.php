<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Refresh a wallet after openning.Alias: *None*.
 */
class RefreshResponse
{
	use JsonSerialize;

	/**
	 * Number of new blocks scanned.
	 */
	#[Json('blocks_fetched')]
	public int $blocksFetched;

	/**
	 * States if transactions to the wallet have been found in the blocks.
	 */
	#[Json('received_money')]
	public bool $receivedMoney;
}
