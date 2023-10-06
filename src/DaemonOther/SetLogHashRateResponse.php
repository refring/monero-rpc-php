<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Set the log hash rate display mode.
 */
class SetLogHashRateResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;
}
