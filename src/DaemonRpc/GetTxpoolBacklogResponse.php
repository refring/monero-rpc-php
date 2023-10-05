<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get all transaction pool backlog
 */
class GetTxpoolBacklogResponse
{
    use JsonSerialize;
    use DaemonStandardResponseFields;

    /**
     * array of structures tx_backlog_entry (in binary form)
     */
    #[Json]
    public string $backlog;
}
