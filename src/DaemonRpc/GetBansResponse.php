<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Enum\ResponseStatus;
use RefRing\MoneroRpcPhp\Model\BannedNode;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get list of banned IPs.Alias: *None*.
 */
class GetBansResponse
{
    use JsonSerialize;

    /** @var BannedNode[] */
    #[Json]
    public array $bans;

    /**
     * General RPC error code. "OK" means everything looks good.
     */
    #[Json]
    public ResponseStatus $status;

    /**
     * States if the result is obtained using the bootstrap mode, and is therefore not trusted (`true`), or when the daemon is fully synced and thus handles the RPC locally (`false`)
     */
    #[Json]
    public bool $untrusted;
}
