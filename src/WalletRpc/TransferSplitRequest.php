<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Enum\TransferPriority;
use RefRing\MoneroRpcPhp\Model\Destination;
use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Same as transfer, but can split into more than one tx if necessary.
 */
class TransferSplitRequest implements ParameterInterface
{
    use JsonSerialize;

    /** @var Destination[] */
    #[Json(type: Destination::class)]
    public array $destinations;

    /**
     * Transfer from this account index.
     * When omitted the default value is 0
     */
    #[Json('account_index', omit_empty: true)]
    public ?int $accountIndex;

    /**
     * @var ?int[] Transfer from this set of subaddresses.
     * When omitted the default value is empty - all indices
     */
    #[Json('subaddr_indices', omit_empty: true)]
    public ?array $subaddrIndices;

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
     * Set a priority for the transactions. Accepted Values are: 0-3 for: default, unimportant, normal, elevated, priority.
     */
    #[Json(omit_empty: true)]
    public ?TransferPriority $priority;

    /**
     * If true, the newly created transaction will not be relayed to the monero network.
     * When omitted the default value is false
     */
    #[Json('do_not_relay', omit_empty: true)]
    public ?bool $doNotRelay;

    /**
     * Return the transactions as hex string after sending
     */
    #[Json('get_tx_hex', omit_empty: true)]
    public ?bool $getTxHex;

    /**
     * Return list of transaction metadata needed to relay the transfer later.
     */
    #[Json('get_tx_metadata', omit_empty: true)]
    public ?bool $getTxMetadata;


    /**
     * @param Destination[] $destinations
     * @param ?int[] $subaddrIndices
     */
    public static function create(
        array $destinations,
        ?int $accountIndex = 0,
        ?array $subaddrIndices = [],
        ?int $ringSize = null,
        ?int $unlockTime = null,
        ?string $paymentId = null,
        ?bool $getTxKeys = null,
        ?TransferPriority $priority = null,
        ?bool $doNotRelay = null,
        ?bool $getTxHex = null,
        ?bool $getTxMetadata = null,
    ): RpcRequest
    {
        $self = new self();
        $self->destinations = $destinations;
        $self->accountIndex = $accountIndex;
        $self->subaddrIndices = $subaddrIndices;
        $self->ringSize = $ringSize;
        $self->unlockTime = $unlockTime;
        $self->paymentId = $paymentId;
        $self->getTxKeys = $getTxKeys;
        $self->priority = $priority;
        $self->doNotRelay = $doNotRelay;
        $self->getTxHex = $getTxHex;
        $self->getTxMetadata = $getTxMetadata;
        return new RpcRequest('transfer_split', $self);
    }
}
