<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class TransferDescription
{
    use JsonSerialize;

    /**
     * The sum of the inputs spent by the transaction in @atomic-units.
     */
    #[Json('amount_in')]
    public int $amountIn;

    /**
     * The sum of the outputs created by the transaction in @atomic-units.
     */
    #[Json('amount_out')]
    public int $amountOut;

    /** @var TransferDestination[] list of recipients: */
    #[Json]
    public array $recipients;


    /**
     * @param TransferDestination[] $recipients
     */
    public function __construct(int $amountIn, int $amountOut, array $recipients)
    {
        $this->amountIn = $amountIn;
        $this->amountOut = $amountOut;
        $this->recipients = $recipients;
    }
}
