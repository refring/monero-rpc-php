<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use Square\Pjson\JsonSerialize;

/**
 * Start mining on the daemon.
 */
class StartMiningResponse
{
    use JsonSerialize;
    use DaemonStandardResponseFields;
}
