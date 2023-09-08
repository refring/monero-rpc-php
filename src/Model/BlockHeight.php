<?php

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\JsonDataSerializable;

class BlockHeight implements JsonDataSerializable
{
    public function __construct(
        public int $value,
    ) {
    }

    public static function fromJsonData($jd, array|string $path = []) : static
    {
        return new BlockHeight($jd);
    }

    public function toJsonData()
    {
        return $this->value;
    }
}
