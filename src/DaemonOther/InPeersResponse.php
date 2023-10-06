<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Limit number of Incoming peers.
 */
class InPeersResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * Max number of incoming peers
     */
    #[Json('in_peers')]
    public int $inPeers;
}
