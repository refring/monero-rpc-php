<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Create a payment URI using the official URI spec.Alias: *None*.
 */
class MakeUriRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * Wallet address
     */
    #[Json]
    public string $address;

    /**
     * (optional) the integer amount to receive, in **@atomic-units**
     */
    #[Json(omit_empty: true)]
    public ?int $amount;

    /**
     * (Optional, defaults to a random ID) 16 characters hex encoded.
     */
    #[Json('payment_id', omit_empty: true)]
    public ?string $paymentId;

    /**
     * (optional) name of the payment recipient
     */
    #[Json('recipient_name', omit_empty: true)]
    public ?string $recipientName;

    /**
     * (optional) Description of the reason for the tx
     */
    #[Json('tx_description', omit_empty: true)]
    public ?string $txDescription;


    public static function create(
        string $address,
        ?int $amount = null,
        ?string $paymentId = null,
        ?string $recipientName = null,
        ?string $txDescription = null,
    ): RpcRequest {
        $self = new self();
        $self->address = $address;
        $self->amount = $amount;
        $self->paymentId = $paymentId;
        $self->recipientName = $recipientName;
        $self->txDescription = $txDescription;
        return new RpcRequest('make_uri', $self);
    }
}
