<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Make an integrated address from the wallet address and a payment id.
 */
class MakeIntegratedAddressResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

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
