<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\JsonSerialize;

/**
 * Flush bad transactions / blocks from the cache.
 */
class FlushCacheResponse
{
    use JsonSerialize;
    use DaemonStandardResponseFields;
}
