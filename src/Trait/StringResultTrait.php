<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Trait;

use Square\Pjson\Json;

trait StringResultTrait
{
    use JsonSerializeBigInt{
        fromJsonData as protected traitFromJsonData;
    }

    public function __construct(
        #[Json(['result'])]
        public string $value,
    ) {
    }

    /**
     * @param mixed[] $jd
     * @param mixed[]|string $path
     * @return static
     */
    public static function fromJsonData(array $jd, array|string $path = []): static
    {
        return self::traitFromJsonData($jd);
    }

    public function toJsonData(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
