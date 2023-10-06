<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Relay a list of transaction IDs.
 */
class RelayTxResponse
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;
}
