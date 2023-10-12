<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc\Model;

use Square\Pjson\JsonDataSerializable;

final class HexDifficulty implements JsonDataSerializable
{
    public function __construct(
        public readonly int $value,
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
        return $this->__toString();
    }

    public function __toString(): string
    {
        return '0x'.dechex($this->value);
    }
}
