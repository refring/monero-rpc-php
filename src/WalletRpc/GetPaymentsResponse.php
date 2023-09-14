<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Payment;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get a list of incoming payments using a given payment id.<p style="color:red;"><b>WARNING</b> Verify that the payment has a sane <code>unlock_time</code> otherwise the funds might be inaccessible</p>
 */
class GetPaymentsResponse
{
    use JsonSerialize;

    /** @var Payment[] */
    #[Json(type: Payment::class)]
    public array $payments;
}
