<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use RefRing\MoneroRpcPhp\Model\BlockHash;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Get the node's current height.
 */
class GetHeightResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * The block's hash.
     */
    #[Json]
    public BlockHash $hash;

    /**
     * Current length of longest chain known to daemon.
     */
    #[Json]
    public int $height;
}
