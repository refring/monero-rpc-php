<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Stop mining on the daemon.
 */
class StopMiningResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;
}
