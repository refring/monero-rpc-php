<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Start mining in the Monero daemon.
 */
class StartMiningRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Number of threads created for mining.
     */
    #[Json('threads_count')]
    public int $threadsCount;

    /**
     * Allow to start the miner in @smart-mining mode.
     */
    #[Json('do_background_mining')]
    public bool $doBackgroundMining;

    /**
     * Ignore battery status (for @smart-mining only)
     */
    #[Json('ignore_battery')]
    public bool $ignoreBattery;

    public static function create(int $threadsCount, bool $doBackgroundMining, bool $ignoreBattery): RpcRequest
    {
        $self = new self();
        $self->threadsCount = $threadsCount;
        $self->doBackgroundMining = $doBackgroundMining;
        $self->ignoreBattery = $ignoreBattery;
        return new RpcRequest('start_mining', $self);
    }
}
