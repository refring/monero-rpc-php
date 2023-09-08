<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Enum\ResponseStatus;
use RefRing\MoneroRpcPhp\Model\PeerStructure;
use RefRing\MoneroRpcPhp\Model\SpanStructure;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get synchronisation informationsAlias: *None*.
 */
class SyncInfoResponse
{
    use JsonSerialize;

    /**
     * If payment for RPC is enabled, the number of credits available to the requesting client. Otherwise, 0.
     */
    #[Json]
    public int $credits;

    #[Json]
    public int $height;

    /**
     * The next pruning seed needed for pruned sync.
     */
    #[Json('next_needed_pruning_seed')]
    public int $nextNeededPruningSeed;

    /**
     * Overview of current block queue where each character in the string represents a block set in the queue. `. = requested but not received`, `o = set received`, `m  = received set that matches the next blocks needed`
     */
    #[Json]
    public string $overview;

    /** @var PeerStructure[] */
    #[Json]
    public array $peers;

    /** @var SpanStructure[] */
    #[Json(omit_empty: true)]
    public array $spans;

    /**
     * General RPC error code. "OK" means everything looks good.
     */
    #[Json]
    public ResponseStatus $status;

    /**
     * target height the node is syncing from (will be 0 if node is fully synced)
     */
    #[Json('target_height')]
    public int $targetHeight;

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
}
