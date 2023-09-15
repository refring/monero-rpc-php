<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\BacklogTransaction;
use RefRing\MoneroRpcPhp\Model\HexDifficulty;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Provide the necessary data to create a custom block template. They are used by p2pool.
 */
class GetMinerDataResponse extends DaemonBaseResponse
{
    use JsonSerialize;

    /**
     * coins mined by the network so far.
     */
    #[Json('already_generated_coins')]
    public int $alreadyGeneratedCoins;


    /**
     * network. difficulty.
     */
    #[Json]
    public HexDifficulty $difficulty;

    /**
     * current blockheight.
     */
    #[Json]
    public int $height;

    /**
     * major fork version.
     */
    #[Json('major_version')]
    public int $majorVersion;

    /**
     * median block weight.
     */
    #[Json('median_weight')]
    public int $medianWeight;

    /**
     * previous block id.
     */
    #[Json('prev_id')]
    public string $prevId;

    /**
     * RandomX seed hash.
     */
    #[Json('seed_hash')]
    public string $seedHash;

    /** @var BacklogTransaction[] */
    #[Json('tx_backlog')]
    public array $txBacklog;
}
