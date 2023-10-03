<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonBaseResponse;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Stop mining on the daemon.
 */
class StopMiningResponse extends DaemonBaseResponse
{
    use JsonSerialize;
}
