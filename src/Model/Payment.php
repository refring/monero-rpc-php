<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class Payment
{
	use JsonSerialize;

	/**
	 * Payment ID matching the input parameter.
	 */
	#[Json('payment_id')]
	public string $paymentId;

	/**
	 * Transaction hash used as the transaction ID.
	 */
	#[Json('tx_hash')]
	public string $txHash;

	/**
	 * Amount for this payment.
	 */
	#[Json]
	public int $amount;

	/**
	 * Height of the block that first confirmed this payment.
	 */
	#[Json('block_height')]
	public int $blockHeight;

	/**
	 * Time (in block height) until this payment is safe to spend.
	 */
	#[Json('unlock_time')]
	public int $unlockTime;

	/**
	 * Is the output spendable.
	 */
	#[Json]
	public bool $locked;

	/**
	 * JSON object containing the major & minor subaddress index:
	 */
	#[Json('subaddr_index')]
	public SubAddressIndex $subaddrIndex;


	public function __construct(
		string $paymentId,
		string $txHash,
		int $amount,
		int $blockHeight,
		int $unlockTime,
		bool $locked,
		SubAddressIndex $subaddrIndex,
	) {
		$this->paymentId = $paymentId;
		$this->txHash = $txHash;
		$this->amount = $amount;
		$this->blockHeight = $blockHeight;
		$this->unlockTime = $unlockTime;
		$this->locked = $locked;
		$this->subaddrIndex = $subaddrIndex;
	}
}
