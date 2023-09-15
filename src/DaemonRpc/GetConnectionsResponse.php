<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\ConnectionInfo;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Retrieve information about incoming and outgoing connections to your node.
 */
class GetConnectionsResponse extends DaemonBaseResponse
{
    use JsonSerialize;

    /** @var ConnectionInfo[] */
    #[Json]
    public array $connections;
}
