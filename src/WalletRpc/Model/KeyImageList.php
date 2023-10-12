<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc\Model;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class KeyImageList implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * @var string[]
     */
    #[Json('key_images')]
    public array $keyImages = [];
}
