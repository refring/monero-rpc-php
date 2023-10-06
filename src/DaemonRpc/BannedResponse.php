<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Enum\ResponseStatus;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Check if an IP address is banned and for how long.
 */
class BannedResponse
{
    use JsonSerializeBigInt;

    #[Json]
    public bool $banned;

    #[Json]
    public int $seconds;

    /**
     * General RPC error code. "OK" means everything looks good.
     */
    #[Json]
    public ResponseStatus $status;
}
