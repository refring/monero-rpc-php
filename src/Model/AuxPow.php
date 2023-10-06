<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

class AuxPow
{
    use JsonSerializeBigInt;

    #[Json]
    public string $id;

    #[Json]
    public string $hash;

    public function __construct(string $id, string $hash)
    {
        $this->id = $id;
        $this->hash = $hash;
    }
}
