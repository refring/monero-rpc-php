<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use RefRing\MoneroRpcPhp\WalletRpc\Model\Payment;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Get a list of incoming payments using a given payment id, or a list of payments ids, from a given height. This method is the preferred method over `get_payments` because it has the same functionality but is more extendable. Either is fine for looking up transactions by a single payment ID.<p style="color:red;"><b>WARNING</b> Verify that the payment has a sane <code>unlock_time</code> otherwise the funds might be inaccessible.</p>
 */
class GetBulkPaymentsResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /** @var Payment[] */
    #[Json(type: Payment::class)]
    public array $payments = [];
}
