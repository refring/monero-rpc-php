<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use RefRing\MoneroRpcPhp\Monero\Amount;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

class TransferDescription
{
    use JsonSerializeBigInt;

    /**
     * The sum of the inputs spent by the transaction in piconero.
     */
    #[Json('amount_in')]
    public Amount $amountIn;

    /**
     * The sum of the outputs created by the transaction in piconero.
     */
    #[Json('amount_out')]
    public Amount $amountOut;

    /**
     * The number of inputs in the ring (1 real output + the number of decoys from the blockchain) (Unless dealing with pre rct outputs, this field is ignored on mainnet).
     */
    #[Json('ring_size')]
    public int $ringSize;

    /**
     * The number of blocks before the monero can be spent (0 for no lock).
     */
    #[Json('unlock_time')]
    public int $unlockTime;

    /** @var Destination[] list of recipients: */
    #[Json(type: Destination::class)]
    public array $recipients = [];

    /**
     * payment ID for this transfer.
     */
    #[Json('payment_id')]
    public string $paymentId;

    /**
     * The amount sent to the change address in piconero
     */
    #[Json('change_amount')]
    public int $changeAmount;

    /**
     * The address of the change recipient.
     */
    #[Json('change_address')]
    public string $changeAddress;

    /**
     * The fee charged for the transaction in piconero.
     */
    #[Json]
    public int $fee;

    /**
     * The number of fake outputs added to single-output transactions.  Fake outputs have 0 amount and are sent to a random address.
     */
    #[Json('dummy_outputs')]
    public int $dummyOutputs;

    /**
     * Arbitrary transaction data in hexadecimal format.
     */
    #[Json]
    public string $extra;

    /**
     * @param Destination[] $recipients
     */
    public function __construct(Amount $amountIn, Amount $amountOut, int $ringSize, int $unlockTime, array $recipients, string $paymentId, int $changeAmount, string $changeAddress, int $fee, int $dummyOutputs, string $extra)
    {
        $this->amountIn = $amountIn;
        $this->amountOut = $amountOut;
        $this->ringSize = $ringSize;
        $this->unlockTime = $unlockTime;
        $this->recipients = $recipients;
        $this->paymentId = $paymentId;
        $this->changeAmount = $changeAmount;
        $this->changeAddress = $changeAddress;
        $this->fee = $fee;
        $this->dummyOutputs = $dummyOutputs;
        $this->extra = $extra;
    }


}
