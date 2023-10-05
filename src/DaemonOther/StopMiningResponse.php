<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use Square\Pjson\JsonSerialize;

/**
 * Stop mining on the daemon.
 */
class StopMiningResponse
{
    use JsonSerialize;
    use DaemonStandardResponseFields;
}
