<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Make an integrated address from the wallet address and a payment id.Alias: *None*.
 */
class MakeIntegratedAddressResponse
{
    use JsonSerialize;

    /**
     * string
     */
    #[Json('integrated_address')]
    public string $integratedAddress;

    /**
     * hex encoded;
     */
    #[Json('payment_id')]
    public string $paymentId;
}
