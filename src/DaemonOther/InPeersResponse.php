<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Limit number of Incoming peers.
 */
class InPeersResponse
{
    use JsonSerialize;
    use DaemonStandardResponseFields;

    /**
     * Max number of incoming peers
     */
    #[Json('in_peers')]
    public int $inPeers;
}
