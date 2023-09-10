<?php

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\JsonDataSerializable;

final class HexDifficulty implements JsonDataSerializable
{
    public function __construct(
        protected int $value,
    ) {
    }

    /**
     * @param string $jd
     * @param mixed[]|string $path
     */
    public static function fromJsonData($jd, array|string $path = []): static
    {
        return new static((int)hexdec($jd));
    }

    public function toJsonData(): string
    {
        return '0x'.dechex($this->value);
    }
}
