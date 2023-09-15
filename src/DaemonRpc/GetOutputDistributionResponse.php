<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\Distribution;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 *
 */
class GetOutputDistributionResponse extends RpcAccessBaseResponse
{
    use JsonSerialize;

    /** @var Distribution[] */
    #[Json]
    public array $distributions;
}
