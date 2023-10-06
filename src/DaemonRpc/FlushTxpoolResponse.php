<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Flush tx ids from transaction pool
 */
class FlushTxpoolResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;
}
