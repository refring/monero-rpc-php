<?php

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\JsonDataSerializable;

class BlockHash implements JsonDataSerializable
{
    public function __construct(
        public string $value,
    ) {
    }

    public static function fromJsonData($jd, array|string $path = []) : static
    {
        return new BlockHash($jd);
    }

    public function toJsonData(): string
    {
        return $this->value;
    }
}
