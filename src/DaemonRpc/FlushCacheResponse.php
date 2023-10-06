<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Flush bad transactions / blocks from the cache.
 */
class FlushCacheResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;
}
