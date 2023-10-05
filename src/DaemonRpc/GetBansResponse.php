<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\BannedNode;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get list of banned IPs.
 */
class GetBansResponse
{
    use JsonSerialize;
    use DaemonStandardResponseFields;

    /** @var BannedNode[] */
    #[Json(type: BannedNode::class)]
    public array $bans;
}
