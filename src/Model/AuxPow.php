<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class AuxPow
{
    use JsonSerialize;

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
