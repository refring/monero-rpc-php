<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Request;

use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;
use Square\Pjson\JsonSerialize;

class OtherRpcRequest
{
    private ?ParameterInterface $parameters;

    public function __construct(ParameterInterface $parameters = null)
    {
        $this->parameters = $parameters;
    }

    public function toJson(): string
    {
        return $this->parameters->toJson();
    }
}
