<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Restores a wallet from a given wallet address, view key, and optional spend key.
 */
class GenerateFromKeysResponse
{
	use JsonSerialize;

	/**
	 * The wallet's address.
	 */
	#[Json]
	public string $address;

	/**
	 * Verification message indicating that the wallet was generated successfully and whether or not it is a view-only wallet.
	 */
	#[Json]
	public string $info;
}
