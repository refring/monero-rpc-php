<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

class SignedKeyImage
{
    use JsonSerializeBigInt;

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
