<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonBaseResponse;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Limit number of Outgoing peers.
 */
class OutPeersResponse extends DaemonBaseResponse
{
    use JsonSerialize;

    /**
     * Max number of outgoing peers
     */
    #[Json('out_peers')]
    public int $outPeers;
}
