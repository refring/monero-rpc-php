<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\SpanStructure;
use RefRing\MoneroRpcPhp\Model\SyncPeer;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Get synchronisation informations
 */
class SyncInfoResponse
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

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

    /** @var SyncPeer[] */
    #[Json(type: SyncPeer::class)]
    public array $peers = [];

    /** @var SpanStructure[] */
    #[Json(omit_empty: true, type: SpanStructure::class)]
    public array $spans = [];

    /**
     * target height the node is syncing from (will be 0 if node is fully synced)
     */
    #[Json('target_height')]
    public int $targetHeight;
}
