<?php

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\JsonDataSerializable;

final class Address implements JsonDataSerializable
{
    public function __construct(
        public string $address,
    ) {
    }

    /**
     * @param string $jd
     * @param mixed[]|string $path
     */
    public static function fromJsonData($jd, array|string $path = []): static
    {
        return new static($jd);
    }

    public function toJsonData(): string
    {
        return $this->address;
    }
}
