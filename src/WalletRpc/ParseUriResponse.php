<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\PaymentUri;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Parse a payment URI to get payment information.
 */
class ParseUriResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * JSON object containing payment information:
     */
    #[Json]
    public PaymentUri $uri;
}
