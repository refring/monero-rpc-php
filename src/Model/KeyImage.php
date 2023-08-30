<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class KeyImage
{
	use JsonSerialize;

	#[Json('key_image')]
	public string $keyImage;

	#[Json]
	public string $signature;


	public function __construct(string $keyImage, string $signature)
	{
		$this->keyImage = $keyImage;
		$this->signature = $signature;
	}
}
