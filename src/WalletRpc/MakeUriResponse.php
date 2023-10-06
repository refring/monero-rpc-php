<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Create a payment URI using the official URI spec.
 */
class MakeUriResponse
{
    use JsonSerializeBigInt;

    /**
     * This contains all the payment input information as a properly formatted payment URI
     */
    #[Json]
    public string $uri;
}
