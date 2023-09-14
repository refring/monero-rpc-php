<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\PaymentUri;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Parse a payment URI to get payment information.
 */
class ParseUriResponse
{
    use JsonSerialize;

    /**
     * JSON object containing payment information:
     */
    #[Json]
    public PaymentUri $uri;
}
