<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\ChainInformation;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Display alternative chains seen by the node.
 */
class GetAlternateChainsResponse extends DaemonBaseResponse
{
    use JsonSerialize;

    /** @var ChainInformation[] */
    #[Json(type: ChainInformation::class)]
    public array $chains;
}
