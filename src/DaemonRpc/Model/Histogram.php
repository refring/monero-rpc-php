<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc\Model;

use RefRing\MoneroRpcPhp\Model\Amount;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class Histogram implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Output amount in piconero
     */
    #[Json]
    public Amount $amount;

    #[Json('total_instances')]
    public int $totalInstances;

    #[Json('unlocked_instances')]
    public int $unlockedInstances;

    #[Json('recent_instances')]
    public int $recentInstances;

    public function __construct(Amount $amount, int $totalInstances, int $unlockedInstances, int $recentInstances)
    {
        $this->amount = $amount;
        $this->totalInstances = $totalInstances;
        $this->unlockedInstances = $unlockedInstances;
        $this->recentInstances = $recentInstances;
    }
}
