<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class PaymentUri
{
	use JsonSerialize;

	/**
	 * Wallet address
	 */
	#[Json]
	public string $address;

	/**
	 * Integer amount to receive, in **@atomic-units** (0 if not provided)
	 */
	#[Json]
	public int $amount;

	/**
	 * (Optional, defaults to a random ID) 16 characters hex encoded.
	 */
	#[Json('payment_id', omit_empty: true)]
	public string $paymentId;

	/**
	 * Name of the payment recipient (empty if not provided)
	 */
	#[Json('recipient_name')]
	public string $recipientName;

	/**
	 * Description of the reason for the tx (empty if not provided)
	 */
	#[Json('tx_description')]
	public string $txDescription;


	public function __construct(
		string $address,
		int $amount,
		?string $paymentId = null,
		string $recipientName,
		string $txDescription,
	) {
		$this->address = $address;
		$this->amount = $amount;
		$this->paymentId = $paymentId;
		$this->recipientName = $recipientName;
		$this->txDescription = $txDescription;
	}
}
