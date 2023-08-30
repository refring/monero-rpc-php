<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Retrieve the standard address and payment id corresponding to an integrated address.Alias: *None*.
 */
class SplitIntegratedAddressResponse
{
    use JsonSerialize;

    /**
     * States if the address is a subaddress
     */
    #[Json('is_subaddress')]
    public bool $isSubaddress;

    /**
     * string
     */
    #[Json('standard_address')]
    public string $standardAddress;

    /**
     * hex encoded
     */
    #[Json]
    public string $payment;
}
