<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Enum\ResponseStatus;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Submit a mined block to the network.Alias: *submitblock*.
 */
class SubmitBlockResponse
{
    use JsonSerialize;

    /**
     * Number of blocks
     */
    #[Json]
    public int $count;

    /**
     * Block submit status.
     */
    #[Json]
    public ResponseStatus $status;

    /**
     * States if the result is obtained using the bootstrap mode, and is therefore not trusted (`true`), or when the daemon is fully synced and thus handles the RPC locally (`false`)
     */
    #[Json]
    public bool $untrusted;
}
