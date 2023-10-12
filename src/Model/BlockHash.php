<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\JsonDataSerializable;

final class BlockHash implements JsonDataSerializable
{
    public function __construct(
        public string $value,
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
        return $this->__toString();
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
