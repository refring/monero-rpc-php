<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;
use Square\Pjson\JsonSerialize;

class GetOutputsOut implements JsonDataSerializable
{
    use JsonSerialize;

    #[Json]
    public int $amount;

    #[Json]
    public int $index;

    public function __construct(int $amount, int $index)
    {
        $this->amount = $amount;
        $this->index = $index;
    }
}
