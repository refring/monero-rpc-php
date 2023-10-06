<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Start mining on the daemon.
 */
class StartMiningResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;
}
