<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Monero;

use Square\Pjson\JsonDataSerializable;

final class Amount implements JsonDataSerializable
{
    public const MONERO = 1_000_000_000_000;
    private string $amount;

    public function __construct(string|int $piconero)
    {
        if (is_int($piconero)) {
            $piconero = (string) $piconero;
        }
        $this->amount = $piconero;
    }

    public function toXmr(bool $stripTrailingZeros = true): string
    {
        $value = $this->toDenomination(self::MONERO);

        if ($stripTrailingZeros) {
            return rtrim($value, '0.');
        }

        return $value;
    }
    public static function fromXmr(string $xmrAmount): self
    {
        $piconero = bcmul($xmrAmount, (string) self::MONERO, 0);
        return new self($piconero);
    }

    private function toDenomination(int $denomination): string
    {
        return bcdiv($this->amount, (string) $denomination, 12);
    }

    public function getAmount(): string
    {
        return $this->amount;
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
        return $this->getAmount();
    }
}
