<?php

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\JsonDataSerializable;

class HexDifficulty implements JsonDataSerializable
{
    public function __construct(
        protected int $value,
    ) {
    }

    public static function fromJsonData($jd, array|string $path = []): static
    {
        return new HexDifficulty(hexdec($jd));
    }

    public function toJsonData(): string
    {
        return '0x'.dechex($this->value);
    }
}
