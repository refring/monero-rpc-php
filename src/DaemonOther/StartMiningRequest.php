<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Start mining on the daemon.
 */
class StartMiningRequest extends OtherRpcRequest
{
    use JsonSerialize;

    /**
     * States if the mining should run in background (`true`) or foreground (`false`).
     */
    #[Json('do_background_mining')]
    public bool $doBackgroundMining;

    /**
     * States if batery state (on laptop) should be ignored (`true`) or not (`false`).
     */
    #[Json('ignore_battery')]
    public bool $ignoreBattery;

    /**
     * Account address to mine to.
     */
    #[Json('miner_address')]
    public string $minerAddress;

    /**
     * Number of mining thread to run.
     */
    #[Json('threads_count')]
    public int $threadsCount;

    public static function create(
        bool $doBackgroundMining,
        bool $ignoreBattery,
        string $minerAddress,
        int $threadsCount,
    ): OtherRpcRequest {
        $self = new self();
        $self->doBackgroundMining = $doBackgroundMining;
        $self->ignoreBattery = $ignoreBattery;
        $self->minerAddress = $minerAddress;
        $self->threadsCount = $threadsCount;
        return $self;
    }
}
