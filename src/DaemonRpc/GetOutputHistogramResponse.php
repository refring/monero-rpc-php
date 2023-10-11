<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\Histogram;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Get a histogram of output amounts. For all amounts (possibly filtered by parameters), gives the number of outputs on the chain for that amount.RingCT outputs counts as 0 amount.
 */
class GetOutputHistogramResponse
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

    /** @var Histogram[] */
    #[Json(type: Histogram::class)]
    public array $histogram = [];
}
