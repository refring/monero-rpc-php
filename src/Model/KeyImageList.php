<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

class KeyImageList
{
    use JsonSerializeBigInt;

    /**
     * @var string[]
     */
    #[Json('key_images')]
    public array $keyImages = [];
}
