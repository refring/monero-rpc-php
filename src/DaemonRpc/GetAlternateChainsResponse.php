<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\ChainInformation;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Display alternative chains seen by the node.
 */
class GetAlternateChainsResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /** @var ChainInformation[] */
    #[Json(type: ChainInformation::class)]
    public array $chains;
}
