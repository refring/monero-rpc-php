<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

class Distribution implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * unsigned int
     */
    #[Json]
    public int $amount;

    #[Json]
    public bool $binary;

    /**
     * unsigned int
     */
    #[Json]
    public int $base;

    #[Json]
    public string $distribution;

    /**
     * unsigned int
     */
    #[Json('start_height')]
    public int $startHeight;

    public function __construct(int $amount, int $base, string $distribution, int $startHeight)
    {
        $this->amount = $amount;
        $this->base = $base;
        $this->distribution = $distribution;
        $this->startHeight = $startHeight;
    }
}
