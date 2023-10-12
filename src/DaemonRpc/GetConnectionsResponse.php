<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\DaemonRpc\Model\ConnectionInfo;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Retrieve information about incoming and outgoing connections to your node.
 */
class GetConnectionsResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /** @var ConnectionInfo[] */
    #[Json(type: ConnectionInfo::class)]
    public array $connections = [];
}
