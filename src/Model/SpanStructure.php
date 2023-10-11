<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

class SpanStructure implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    public function __construct()
    {
    }
}
