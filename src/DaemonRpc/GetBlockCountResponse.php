<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Look up how many blocks are in the longest chain known to the node.
 */
class GetBlockCountResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * Number of blocks in longest chain seen by the node.
     */
    #[Json]
    public int $count;
}
