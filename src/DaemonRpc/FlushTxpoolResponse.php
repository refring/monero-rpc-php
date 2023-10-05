<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\JsonSerialize;

/**
 * Flush tx ids from transaction pool
 */
class FlushTxpoolResponse
{
    use JsonSerialize;
    use DaemonStandardResponseFields;
}
