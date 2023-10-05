<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Limit number of Outgoing peers.
 */
class OutPeersResponse
{
    use JsonSerialize;
    use DaemonStandardResponseFields;

    /**
     * Max number of outgoing peers
     */
    #[Json('out_peers')]
    public int $outPeers;
}
