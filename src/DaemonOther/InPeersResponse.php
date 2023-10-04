<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonBaseResponse;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Limit number of Incoming peers.
 */
class InPeersResponse extends DaemonBaseResponse
{
    use JsonSerialize;

    /**
     * Max number of incoming peers
     */
    #[Json('in_peers')]
    public int $inPeers;
}
