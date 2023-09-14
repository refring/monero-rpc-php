<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Create a payment URI using the official URI spec.
 */
class MakeUriResponse
{
    use JsonSerialize;

    /**
     * This contains all the payment input information as a properly formatted payment URI
     */
    #[Json]
    public string $uri;
}
