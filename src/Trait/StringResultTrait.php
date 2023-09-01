<?php

namespace RefRing\MoneroRpcPhp\Trait;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

trait StringResultTrait
{
    use JsonSerialize{
        fromJsonData as protected traitFromJsonData;
    }

    public function __construct(
        #[Json(['result'])]
        public string $value,
    ) {
    }

    public static function fromJsonData($jd, array|string $path = []): static
    {
        return self::traitFromJsonData($jd);
    }

    public function toJsonData(): string
    {
        return $this->value;
    }

    public function __toString() : string{
        return $this->value;
    }
}
