<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\JsonDataSerializable;

final class BigInt implements JsonDataSerializable
{
    public function __construct(
        public string|int $value,
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

    public function toJsonData(): string|int
    {
        return $this->getValue();
    }

    public function getValue(): string|int
    {
        return $this->value;
    }
}
