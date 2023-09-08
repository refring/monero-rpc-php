<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Enum\ResponseStatus;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get all transaction pool backlogAlias: *None*.
 */
class GetTxpoolBacklogResponse
{
    use JsonSerialize;

    /**
     * array of structures
     */
    #[Json]
    public string $backlog;

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
