<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Get all transaction pool backlog
 */
class GetTxpoolBacklogResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * array of structures tx_backlog_entry (in binary form)
     */
    #[Json]
    public string $backlog;
}
