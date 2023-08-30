<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Flush bad transactions / blocks from the cache.Alias: *None*.
 */
class FlushCacheResponse
{
    use JsonSerialize;

    /**
     * General RPC error code. "OK" means everything looks good.
     */
    #[Json]
    public string $status;

    /**
     * States if the result is obtained using the bootstrap mode, and is therefore not trusted (`true`), or when the daemon is fully synced and thus handles the RPC locally (`false`)
     */
    #[Json]
    public bool $untrusted;
}
