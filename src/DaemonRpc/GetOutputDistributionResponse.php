<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\Distribution;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

class GetOutputDistributionResponse
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

    /** @var Distribution[] */
    #[Json(type: Distribution::class)]
    public array $distributions = [];
}
