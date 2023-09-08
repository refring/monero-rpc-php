<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Enum\ResponseStatus;
use RefRing\MoneroRpcPhp\Model\Distribution;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Alias: *None*.
 */
class GetOutputDistributionResponse
{
    use JsonSerialize;

    /** @var Distribution[] */
    #[Json]
    public array $distributions;

    /**
     * General RPC error code. "OK" means everything looks good.
     */
    #[Json]
    public ResponseStatus $status;
}
