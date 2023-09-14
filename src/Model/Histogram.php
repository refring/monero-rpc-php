<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class Histogram
{
    use JsonSerialize;

    /**
     * Output amount in piconero
     */
    #[Json]
    public int $amount;

    #[Json('total_instances')]
    public int $totalInstances;

    #[Json('unlocked_instances')]
    public int $unlockedInstances;

    #[Json('recent_instances')]
    public int $recentInstances;


    public function __construct(int $amount, int $totalInstances, int $unlockedInstances, int $recentInstances)
    {
        $this->amount = $amount;
        $this->totalInstances = $totalInstances;
        $this->unlockedInstances = $unlockedInstances;
        $this->recentInstances = $recentInstances;
    }
}
