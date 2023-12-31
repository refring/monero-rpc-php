<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\DaemonRpc\Model\BannedNode;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Get list of banned IPs.
 */
class GetBansResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /** @var BannedNode[] */
    #[Json(type: BannedNode::class)]
    public array $bans = [];
}
