<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\ChainInformation;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Display alternative chains seen by the node.
 */
class GetAlternateChainsResponse
{
    use JsonSerialize;
    use DaemonStandardResponseFields;

    /** @var ChainInformation[] */
    #[Json(type: ChainInformation::class)]
    public array $chains;
}
