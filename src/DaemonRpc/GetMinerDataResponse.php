<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Enum\ResponseStatus;
use RefRing\MoneroRpcPhp\Model\BacklogTransaction;
use RefRing\MoneroRpcPhp\Model\HexDifficulty;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Provide the necessary data to create a custom block template. They are used by p2pool.
 */
class GetMinerDataResponse
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

    /**
     * General RPC error code. "OK" means everything looks good.
     */
    #[Json]
    public ResponseStatus $status;

    /** @var BacklogTransaction[] */
    #[Json('tx_backlog')]
    public array $txBacklog;

    /**
     * States if the result is obtained using the bootstrap mode, and is therefore not trusted (`true`), or when the daemon is fully synced and thus handles the RPC locally (`false`)
     */
    #[Json]
    public bool $untrusted;
}
