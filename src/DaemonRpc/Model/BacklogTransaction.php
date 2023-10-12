<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc\Model;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class BacklogTransaction implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json]
    public string $id;

    #[Json]
    public int $weight;

    #[Json]
    public int $fee;

    public function __construct(string $id, int $weight, int $fee)
    {
        $this->id = $id;
        $this->weight = $weight;
        $this->fee = $fee;
    }
}
