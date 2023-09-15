<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\JsonSerialize;

/**
 * Relay a list of transaction IDs.
 */
class RelayTxResponse extends RpcAccessBaseResponse
{
    use JsonSerialize;
}
