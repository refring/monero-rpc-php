<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Look up information regarding hard fork voting and readiness.
 */
class HardForkInfoResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

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
     * Minimum percent of votes to trigger hard fork. Default is 80.
     */
    #[Json]
    public int $threshold;

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
