<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\Chain;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Display alternative chains seen by the node.Alias: *None*.
 */
class GetAlternateChainsResponse
{
    use JsonSerialize;

    /** @var Chain[] */
    #[Json]
    public array $chains;

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
