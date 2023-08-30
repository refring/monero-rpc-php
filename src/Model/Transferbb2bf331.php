<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class Transfer
{
	use JsonSerialize;

	/**
	 * Public address of the transfer.
	 */
	#[Json]
	public string $address;

	/**
	 * Amount transferred.
	 */
	#[Json]
	public int $amount;

	/**
	 * If multiple amounts where recived they are individually listed.
	 */
	#[Json]
	public array $amounts;

	/**
	 * Number of block mined since the block containing this transaction (or block height at which the transaction should be added to a block if not yet confirmed).
	 */
	#[Json]
	public int $confirmations;

	/**
	 * True if the key image(s) for the transfer have been seen before.
	 */
	#[Json('double_spend_seen')]
	public bool $doubleSpendSeen;

	/**
	 * Transaction fee for this transfer.
	 */
	#[Json]
	public int $fee;

	/**
	 * Height of the first block that confirmed this transfer (0 if not mined yet).
	 */
	#[Json]
	public int $height;

	/**
	 * Note about this transfer.
	 */
	#[Json]
	public string $note;

	/**
	 * @var TransferDestination[]  array of JSON objects containing transfer destinations: (only for outgoing transactions):
	 */
	#[Json]
	public array $destinations;


	public function __construct(
		string $address,
		int $amount,
		array $amounts,
		int $confirmations,
		bool $doubleSpendSeen,
		int $fee,
		int $height,
		string $note,
		array $destinations,
	) {
		$this->address = $address;
		$this->amount = $amount;
		$this->amounts = $amounts;
		$this->confirmations = $confirmations;
		$this->doubleSpendSeen = $doubleSpendSeen;
		$this->fee = $fee;
		$this->height = $height;
		$this->note = $note;
		$this->destinations = $destinations;
	}
}
