<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Address;
use RefRing\MoneroRpcPhp\Model\Amount;
use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Create a payment URI using the official URI spec.
 */
class MakeUriRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Wallet address
     */
    #[Json]
    public Address $address;

    /**
     * (optional) the integer amount to receive, in **piconero**
     */
    #[Json(omit_empty: true)]
    public ?Amount $amount;

    /**
     * 16 characters hex encoded.
     * When omitted the default value is a random ID
     */
    #[Json('payment_id', omit_empty: true)]
    public ?string $paymentId;

    /**
     * name of the payment recipient
     */
    #[Json('recipient_name', omit_empty: true)]
    public ?string $recipientName;

    /**
     * Description of the reason for the tx
     */
    #[Json('tx_description', omit_empty: true)]
    public ?string $txDescription;

    public static function create(
        Address $address,
        ?Amount $amount = null,
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
