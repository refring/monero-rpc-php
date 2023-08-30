<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class AddressBookEntry
{
	use JsonSerialize;

	/**
	 * Public address of the entry
	 */
	#[Json]
	public string $address;

	/**
	 * Description of this address entry
	 */
	#[Json]
	public string $description;

	#[Json]
	public int $index;

	#[Json('payment_id')]
	public string $paymentId;


	public function __construct(string $address, string $description, int $index, string $paymentId)
	{
		$this->address = $address;
		$this->description = $description;
		$this->index = $index;
		$this->paymentId = $paymentId;
	}
}
