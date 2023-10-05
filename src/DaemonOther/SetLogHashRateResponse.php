<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use Square\Pjson\JsonSerialize;

/**
 * Set the log hash rate display mode.
 */
class SetLogHashRateResponse
{
    use JsonSerialize;
    use DaemonStandardResponseFields;
}
