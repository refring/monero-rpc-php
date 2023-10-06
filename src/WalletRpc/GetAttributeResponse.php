<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Get attribute value by name.
 */
class GetAttributeResponse
{
    use JsonSerializeBigInt;

    /**
     * attribute value
     */
    #[Json]
    public string $value;
}
