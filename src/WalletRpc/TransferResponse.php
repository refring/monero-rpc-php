<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Send monero to a number of recipients.Alias: *None*.
 */
class TransferResponse
{
	use JsonSerialize;

	/**
	 * Amount transferred for the transaction.
	 */
	#[Json]
	public int $amount;

	/**
	 * Integer value of the fee charged for the txn.
	 */
	#[Json]
	public int $fee;

	/**
	 * Set of multisig transactions in the process of being signed (empty for non-multisig).
	 */
	#[Json('multisig_txset')]
	public string $multisigTxset;

	/**
	 * Raw transaction represented as hex string, if get_tx_hex is true.
	 */
	#[Json('tx_blob')]
	public string $txBlob;

	/**
	 * String for the publically searchable transaction hash.
	 */
	#[Json('tx_hash')]
	public string $txHash;

	/**
	 * String for the transaction key if get_tx_key is true, otherwise, blank string.
	 */
	#[Json('tx_key')]
	public string $txKey;

	/**
	 * Set of transaction metadata needed to relay this transfer later, if get_tx_metadata is true.
	 */
	#[Json('tx_metadata')]
	public string $txMetadata;

	/**
	 * Set of unsigned tx for cold-signing purposes.
	 */
	#[Json('unsigned_txset')]
	public string $unsignedTxset;
}
