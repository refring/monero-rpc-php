<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Retrieve the standard address and payment id corresponding to an integrated address.
 */
class SplitIntegratedAddressResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * States if the address is a subaddress
     */
    #[Json('is_subaddress')]
    public bool $isSubaddress;

    /**
     * hex encoded
     */
    #[Json('payment_id')]
    public string $paymentId;

    /**
     * string
     */
    #[Json('standard_address')]
    public string $standardAddress;
}
