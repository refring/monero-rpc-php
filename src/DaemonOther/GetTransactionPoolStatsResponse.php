<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonRpcAccessResponseFields;
use RefRing\MoneroRpcPhp\Model\TxPoolHisto;
use RefRing\MoneroRpcPhp\Model\TxPoolStats;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get the transaction pool statistics.
 */
class GetTransactionPoolStatsResponse
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

    /**
     * as follows:
     */
    #[Json('pool_stats')]
    public TxPoolStats $poolStats;
}
