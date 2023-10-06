<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Address;
use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Send all of a specific unlocked output to an address.
 */
class SweepSingleRequest implements ParameterInterface
{
    use JsonSerializeBigInt;

    /**
     * Destination public address.
     */
    #[Json]
    public Address $address;

    /**
     * Priority for sending the sweep transfer, partially determines fee.
     */
    #[Json(omit_empty: true)]
    public ?int $priority;

    /**
     * specify the number of separate outputs of smaller denomination that will be created by sweep operation.
     */
    #[Json(omit_empty: true)]
    public ?int $outputs;

    /**
     * Sets ringsize to n (mixin + 1). (Unless dealing with pre rct outputs, this field is ignored on mainnet).
     */
    #[Json('ring_size', omit_empty: true)]
    public ?int $ringSize;

    /**
     * Number of blocks before the monero can be spent (0 to not add a lock).
     */
    #[Json('unlock_time', omit_empty: true)]
    public ?int $unlockTime;

    /**
     * 16 characters hex encoded.
     * When omitted the default value is a random ID
     */
    #[Json('payment_id', omit_empty: true)]
    public ?string $paymentId;

    /**
     * Return the transaction keys after sending.
     */
    #[Json('get_tx_key', omit_empty: true)]
    public ?bool $getTxKey;

    /**
     * Key image of specific output to sweep.
     */
    #[Json('key_image')]
    public string $keyImage;

    /**
     * If true, do not relay this sweep transfer. (
     * When omitted the default value is false
     */
    #[Json('do_not_relay', omit_empty: true)]
    public ?bool $doNotRelay;

    /**
     * return the transactions as hex encoded string. (
     * When omitted the default value is false
     */
    #[Json('get_tx_hex', omit_empty: true)]
    public ?bool $getTxHex;

    /**
     * return the transaction metadata as a string. (
     * When omitted the default value is false
     */
    #[Json('get_tx_metadata', omit_empty: true)]
    public ?bool $getTxMetadata;

    public static function create(
        Address $address,
        string $keyImage,
        ?int $priority = null,
        ?int $outputs = null,
        ?int $ringSize = null,
        ?int $unlockTime = null,
        ?string $paymentId = null,
        ?bool $getTxKey = null,
        ?bool $doNotRelay = null,
        ?bool $getTxHex = null,
        ?bool $getTxMetadata = null,
    ): RpcRequest {
        $self = new self();
        $self->address = $address;
        $self->priority = $priority;
        $self->outputs = $outputs;
        $self->ringSize = $ringSize;
        $self->unlockTime = $unlockTime;
        $self->paymentId = $paymentId;
        $self->getTxKey = $getTxKey;
        $self->keyImage = $keyImage;
        $self->doNotRelay = $doNotRelay;
        $self->getTxHex = $getTxHex;
        $self->getTxMetadata = $getTxMetadata;
        return new RpcRequest('sweep_single', $self);
    }
}
