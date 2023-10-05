<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Enum\ResponseStatus;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Give immediate usability to wallets while syncing by proxying RPC requests.
 */
class SetBootstrapDaemonResponse
{
    use JsonSerialize;

    /**
     * General RPC error code. "OK" means everything looks good.
     */
    #[Json]
    public ResponseStatus $status;
}
