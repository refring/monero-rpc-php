<?php

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\JsonDataSerializable;

class BigInt implements JsonDataSerializable
{
    public function __construct(
        protected string|int $value,
    ) {
    }

    public static function fromJsonData($jd, array|string $path = []) : static
    {
        return new BigInt($jd);
    }

    public function toJsonData()
    {
        return $this->getValue();
    }

    public function getValue(): string|int
    {
        return $this->value;
    }
}
