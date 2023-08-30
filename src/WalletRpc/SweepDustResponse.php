<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Send all dust outputs back to the wallet's, to make them easier to spend (and mix).Alias: *sweep_unmixable*.
 */
class SweepDustResponse
{
	use JsonSerialize;

	/**
	 * array of string. The tx hashes of every transaction.
	 */
	#[Json('tx_hash_list')]
	public string $txHashList;

	/**
	 * array of string. The transaction keys for every transaction.
	 */
	#[Json('tx_key_list')]
	public string $txKeyList;

	/**
	 * array of integer. The amount transferred for every transaction.
	 */
	#[Json('amount_list')]
	public int $amountList;

	/**
	 * array of integer. The amount of fees paid for every transaction.
	 */
	#[Json('fee_list')]
	public int $feeList;

	/**
	 * array of integer. Metric used to calculate transaction fee.
	 */
	#[Json('weight_list')]
	public int $weightList;

	/**
	 * array of string. The tx as hex string for every transaction.
	 */
	#[Json('tx_blob_list')]
	public string $txBlobList;

	/**
	 * array of string. List of transaction metadata needed to relay the transactions later.
	 */
	#[Json('tx_metadata_list')]
	public string $txMetadataList;

	/**
	 * string. The set of signing keys used in a multisig transaction (empty for non-multisig).
	 */
	#[Json('multisig_txset')]
	public string $multisigTxset;

	/**
	 * string. Set of unsigned tx for cold-signing purposes.
	 */
	#[Json('unsigned_txset')]
	public string $unsignedTxset;

	/**
	 * array of string. Key images of spent outputs.
	 */
	#[Json('spent_key_images_list')]
	public string $spentKeyImagesList;
}
