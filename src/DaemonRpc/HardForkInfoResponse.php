<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Enum\ResponseStatus;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Look up information regarding hard fork voting and readiness.Alias: *None*.
 */
class HardForkInfoResponse
{
    use JsonSerialize;

    /**
     * If payment for RPC is enabled, the number of credits available to the requesting client. Otherwise, 0.
     */
    #[Json]
    public int $credits;

    /**
     * Block height at which hard fork would be enabled if voted in.
     */
    #[Json('earliest_height')]
    public int $earliestHeight;

    /**
     * Tells if hard fork is enforced.
     */
    #[Json]
    public bool $enabled;

    /**
     * Current hard fork state: 0 (There is likely a hard fork), 1 (An update is needed to fork properly), or 2 (Everything looks good).
     */
    #[Json]
    public int $state;

    /**
     * General RPC error code. "OK" means everything looks good.
     */
    #[Json]
    public ResponseStatus $status;

    /**
     * Minimum percent of votes to trigger hard fork. Default is 80.
     */
    #[Json]
    public int $threshold;

    /**
     * If payment for RPC is enabled, the hash of the highest block in the chain. Otherwise, empty.
     */
    #[Json('top_hash')]
    public string $topHash;

    /**
     * States if the result is obtained using the bootstrap mode, and is therefore not trusted (`true`), or when the daemon is fully synced and thus handles the RPC locally (`false`)
     */
    #[Json]
    public bool $untrusted;

    /**
     * The major block version for the fork.
     */
    #[Json]
    public int $version;

    /**
     * Number of votes towards hard fork.
     */
    #[Json]
    public int $votes;

    /**
     * Hard fork voting status.
     */
    #[Json]
    public int $voting;

    /**
     * Number of blocks over which current votes are cast. Default is 10080 blocks.
     */
    #[Json]
    public int $window;
}
