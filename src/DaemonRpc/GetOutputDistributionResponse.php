<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\Distribution;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class GetOutputDistributionResponse
{
    use JsonSerialize;
    use DaemonRpcAccessResponseFields;

    /** @var Distribution[] */
    #[Json(type: Distribution::class)]
    public array $distributions;
}
