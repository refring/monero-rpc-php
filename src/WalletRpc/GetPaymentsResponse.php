<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Payment;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get a list of incoming payments using a given payment id.<p style="color:red;"><b>WARNING</b> Verify that the payment has a sane <code>unlock_time</code> otherwise the funds might be inaccessible</p>Alias: *None*.
 */
class GetPaymentsResponse
{
    use JsonSerialize;

    /** @var Payment[] */
    #[Json]
    public array $payments;

    /**
     * Address receiving the payment; Base58 representation of the public keys.
     */
    #[Json]
    public string $address;
}
