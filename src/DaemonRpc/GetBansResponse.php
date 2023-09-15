<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\BannedNode;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get list of banned IPs.
 */
class GetBansResponse extends DaemonBaseResponse
{
    use JsonSerialize;

    /** @var BannedNode[] */
    #[Json]
    public array $bans;
}
