<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Address;
use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Send all unlocked balance to an address.
 */
class SweepAllRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Destination public address.
     */
    #[Json]
    public Address $address;

    /**
     * Sweep transactions from this account.
     */
    #[Json('account_index', omit_empty: true)]
    public ?int $accountIndex;

    /**
     * @var ?int[] Sweep from this set of subaddresses in the account.
     */
    #[Json('subaddr_indices', omit_empty: true)]
    public ?array $subaddrIndices;

    /**
     * use outputs in all subaddresses within an account (.
     * When omitted the default value is false
     */
    #[Json('subaddr_indices_all', omit_empty: true)]
    public ?bool $subaddrIndicesAll;

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
    #[Json('get_tx_keys', omit_empty: true)]
    public ?bool $getTxKeys;

    /**
     * Include outputs below this amount.
     */
    #[Json('below_amount', omit_empty: true)]
    public ?int $belowAmount;

    /**
     * (Optional) If true, do not relay this sweep transfer. (Defaults to false)
     */
    #[Json('do_not_relay', omit_empty: true)]
    public ?bool $doNotRelay;

    /**
     * (Optional) return the transactions as hex encoded string. (Defaults to false)
     */
    #[Json('get_tx_hex', omit_empty: true)]
    public ?bool $getTxHex;

    /**
     * return the transaction metadata as a string. (
     * When omitted the default value is false
     */
    #[Json('get_tx_metadata', omit_empty: true)]
    public ?bool $getTxMetadata;


    /**
     * @param int[] $subaddrIndices
     */
    public static function create(
        Address $address,
        ?int $accountIndex = null,
        ?array $subaddrIndices = null,
        ?bool $subaddrIndicesAll = null,
        ?int $priority = null,
        ?int $outputs = null,
        ?int $ringSize = null,
        ?int $unlockTime = null,
        ?string $paymentId = null,
        ?bool $getTxKeys = null,
        ?int $belowAmount = null,
        ?bool $doNotRelay = null,
        ?bool $getTxHex = null,
        ?bool $getTxMetadata = null,
    ): RpcRequest {
        $self = new self();
        $self->address = $address;
        $self->accountIndex = $accountIndex;
        $self->subaddrIndices = $subaddrIndices;
        $self->subaddrIndicesAll = $subaddrIndicesAll;
        $self->priority = $priority;
        $self->outputs = $outputs;
        $self->ringSize = $ringSize;
        $self->unlockTime = $unlockTime;
        $self->paymentId = $paymentId;
        $self->getTxKeys = $getTxKeys;
        $self->belowAmount = $belowAmount;
        $self->doNotRelay = $doNotRelay;
        $self->getTxHex = $getTxHex;
        $self->getTxMetadata = $getTxMetadata;
        return new RpcRequest('sweep_all', $self);
    }
}
