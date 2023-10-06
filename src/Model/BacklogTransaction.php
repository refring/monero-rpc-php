<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

class BacklogTransaction
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
