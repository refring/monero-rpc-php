<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;

class TxSetSummary
{
    #[Json('amount_in')]
    public int $amountIn;

    #[Json('amount_out')]
    public int $amountOut;

    /**
     * @var Recipient[]
     */
    #[Json(type: Recipient::class)]
    public array $recipients;

    #[Json('change_amount')]
    public int $changeAmount;

    #[Json('change_address')]
    public Address $changeAddress;

    #[Json]
    public int $fee;
}
