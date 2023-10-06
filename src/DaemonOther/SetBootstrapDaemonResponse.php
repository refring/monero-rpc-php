<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Enum\ResponseStatus;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Give immediate usability to wallets while syncing by proxying RPC requests.
 */
class SetBootstrapDaemonResponse
{
    use JsonSerializeBigInt;

    /**
     * General RPC error code. "OK" means everything looks good.
     */
    #[Json]
    public ResponseStatus $status;
}
