<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\BacklogTransaction;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Provide the necessary data to create a custom block template. They are used by p2pool.
 */
class GetMinerDataResponse
{
    use JsonSerialize;

    /**
     * major fork version.
     */
    #[Json('major_version')]
    public int $majorVersion;

    /**
     * current blockheight.
     */
    #[Json]
    public int $height;

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
     * network. difficulty.
     */
    #[Json]
    public int $difficulty;

    /**
     * median block weight.
     */
    #[Json('median_weight')]
    public int $medianWeight;

    /**
     * coins mined by the network so far.
     */
    #[Json('already_generated_coins')]
    public int $alreadyGeneratedCoins;

    /**
     * General RPC error code. "OK" means everything looks good.
     */
    #[Json]
    public string $status;

    /** @var BacklogTransaction[] */
    #[Json('tx_backlog')]
    public array $txBacklog;

    /**
     * States if the result is obtained using the bootstrap mode, and is therefore not trusted (`true`), or when the daemon is fully synced and thus handles the RPC locally (`false`)
     */
    #[Json]
    public bool $untrusted;
}
