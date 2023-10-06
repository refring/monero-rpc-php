<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;

trait DaemonRpcAccessResponseFields
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * If payment for RPC is enabled, the number of credits available to the requesting client. Otherwise, 0.
     */
    #[Json]
    public int $credits;

    /**
     * If payment for RPC is enabled, the hash of the highest block in the chain. Otherwise, empty.
     */
    #[Json('top_hash')]
    public string $topHash;

}
