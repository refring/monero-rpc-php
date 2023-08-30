<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class BacklogTransaction
{
	use JsonSerialize;

	#[Json]
	public string $id;

	#[Json]
	public int $weight;

	#[Json]
	public int $fee;


	public function __construct(string $id, int $weight, int $fee)
	{
		$this->id = $id;
		$this->weight = $weight;
		$this->fee = $fee;
	}
}
