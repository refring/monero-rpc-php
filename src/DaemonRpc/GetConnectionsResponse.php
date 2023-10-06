<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\ConnectionInfo;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Retrieve information about incoming and outgoing connections to your node.
 */
class GetConnectionsResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /** @var ConnectionInfo[] */
    #[Json(type: ConnectionInfo::class)]
    public array $connections;
}
