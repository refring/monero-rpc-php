<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther\Model;

use RefRing\MoneroRpcPhp\Model\BlockHeight;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class Input implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json(['gen', 'height'])]
    public BlockHeight $gen;

    #[Json]
    public InputKey $key;
}
