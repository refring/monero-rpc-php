<?php

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\JsonDataSerializable;

final class BlockHeight implements JsonDataSerializable
{
    public function __construct(
        public int $value,
    ) {
    }

    /**
     * @param int $jd
     * @param mixed[]|string $path
     */
    public static function fromJsonData($jd, array|string $path = []): static
    {
        return new static($jd);
    }

    public function toJsonData()
    {
        return $this->value;
    }
}
