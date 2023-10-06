<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;

/**
 * Get the node's current height.
 */
class GetHeightResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * The block's hash.
     */
    #[Json]
    public string $hash;

    /**
     * Current length of longest chain known to daemon.
     */
    #[Json]
    public int $height;
}
