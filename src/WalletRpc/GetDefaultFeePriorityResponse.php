<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Returns the adjusted fee priority(1-4) that the auto/default(0) tier will be mapped to.
 */
class GetDefaultFeePriorityResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * The adjusted fee priority(1-4) that the auto/default(0) tier will be mapped to.
     */
    #[Json]
    public int $priority;
}
