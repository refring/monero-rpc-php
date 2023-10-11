<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use RefRing\MoneroRpcPhp\Monero\Amount;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

class PaymentUri implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Wallet address
     */
    #[Json]
    public Address $address;

    /**
     * Integer amount to receive, in **piconero** (0 if not provided)
     */
    #[Json]
    public Amount $amount;

    /**
     * (Optional, defaults to a random ID) 16 characters hex encoded.
     */
    #[Json('payment_id', omit_empty: true)]
    public ?string $paymentId;

    /**
     * Name of the payment recipient (empty if not provided)
     */
    #[Json('recipient_name')]
    public string $recipientName;

    /**
     * Description of the reason for the tx (empty if not provided)
     */
    #[Json('tx_description')]
    public string $txDescription;

    public function __construct(
        Address|string $address,
        Amount $amount,
        string $recipientName,
        string $txDescription,
        ?string $paymentId = null,
    ) {
        if (is_string($address)) {
            $address = new Address($address);
        }

        $this->address = $address;
        $this->amount = $amount;
        $this->paymentId = $paymentId;
        $this->recipientName = $recipientName;
        $this->txDescription = $txDescription;
    }
}
