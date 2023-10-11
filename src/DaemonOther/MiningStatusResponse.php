<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use RefRing\MoneroRpcPhp\Model\Address;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get the mining status of the daemon.
 */
class MiningStatusResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * States if mining is enabled (`true`) or disabled (`false`).
     */
    #[Json]
    public bool $active;

    /**
     * Account address daemon is mining to. Empty if not mining.
     */
    #[Json]
    public Address $address;

    /**
     * Minimum average idle percentage over lookback interval.
     */
    #[Json('bg_idle_threshold')]
    public int $bgIdleThreshold;

    /**
     * If false, the device will stop mining when battery is low.
     */
    #[Json('bg_ignore_battery')]
    public bool $bgIgnoreBattery;

    /**
     * Minimum lookback interval in seconds for determining whether the device is idle or not.
     */
    #[Json('bg_min_idle_seconds')]
    public int $bgMinIdleSeconds;

    /**
     * Maximum percentage cpu use by miner.
     */
    #[Json('bg_target')]
    public int $bgTarget;

    /**
     * Base block reward for the next block to be mined.
     */
    #[Json('block_reward')]
    public int $blockReward;

    /**
     * The target number of seconds between blocks.
     */
    #[Json('block_target')]
    public int $blockTarget;

    /**
     * Network difficulty (analogous to the strength of the network)
     */
    #[Json]
    public int $difficulty;

    /**
     * Most-significant 64 bits of the 128-bit network difficulty.
     */
    #[Json('difficulty_top64')]
    public int $difficultyTop64;

    /**
     * States if the mining is running in background (`true`) or foreground (`false`).
     */
    #[Json('is_background_mining_enabled')]
    public bool $isBackgroundMiningEnabled;

    /**
     * The name of the proof-of-work algorithm currently being used by the miner.
     */
    #[Json('pow_algorithm')]
    public string $powAlgorithm;

    /**
     * Mining power in hashes per seconds.
     */
    #[Json]
    public int $speed;

    /**
     * Number of running mining threads.
     */
    #[Json('threads_count')]
    public int $threadsCount;

    /**
     * Network difficulty (analogous to the strength of the network) as a hexadecimal string representing a 128-bit number.
     */
    #[Json('wide_difficulty')]
    public string $wideDifficulty;
}
