<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\RpcAccessBaseResponse;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Check if outputs have been spent using the key image associated with the output.
 */
class IsKeyImageSpentResponse extends RpcAccessBaseResponse
{
    use JsonSerialize;

    /**
     * @var int[] List of statuses for each image checked. Statuses are follows: 0 = unspent, 1 = spent in blockchain, 2 = spent in transaction pool
     */
    #[Json('spent_status')]
    public array $spentStatus;
}
