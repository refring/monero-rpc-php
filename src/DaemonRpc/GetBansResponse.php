<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\BannedNode;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Get list of banned IPs.
 */
class GetBansResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /** @var BannedNode[] */
    #[Json(type: BannedNode::class)]
    public array $bans = [];
}
