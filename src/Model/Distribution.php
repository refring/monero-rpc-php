<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class Distribution
{
    use JsonSerialize;

    /**
     * unsigned int
     */
    #[Json]
    public int $amount;

    /**
     * unsigned int
     */
    #[Json]
    public int $base;

    /**
     * @var int[]
     */
    #[Json]
    public array $distribution;

    /**
     * unsigned int
     */
    #[Json('start_height')]
    public int $startHeight;


    /**
     * @param int[] $distribution
     */
    public function __construct(int $amount, int $base, array $distribution, int $startHeight)
    {
        $this->amount = $amount;
        $this->base = $base;
        $this->distribution = $distribution;
        $this->startHeight = $startHeight;
    }
}
