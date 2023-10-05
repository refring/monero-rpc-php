<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonRpcAccessResponseFields;
use RefRing\MoneroRpcPhp\Enum\SpentStatus;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Check if outputs have been spent using the key image associated with the output.
 */
class IsKeyImageSpentResponse
{
    use JsonSerialize;
    use DaemonRpcAccessResponseFields;

    /**
     * @var SpentStatus[] List of statuses for each image checked. Statuses are follows: 0 = unspent, 1 = spent in blockchain, 2 = spent in transaction pool
     */
    #[Json('spent_status', type: SpentStatus::class)]
    public array $spentStatus;
}
