<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Request;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

class OtherRpcRequest implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
