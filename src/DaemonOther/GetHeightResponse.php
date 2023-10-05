<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get the node's current height.
 */
class GetHeightResponse
{
    use JsonSerialize;
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
