<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Set the daemon log level.By default, log level is set to `0`.
 */
class SetLogLevelResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;
}
