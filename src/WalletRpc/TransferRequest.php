<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Enum\TransferPriority;
use RefRing\MoneroRpcPhp\Model\Destination;
use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;

/**
 * Send monero to a number of recipients.
 */
class TransferRequest implements ParameterInterface
{
    use JsonSerializeBigInt;

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
     * Set a priority for the transaction. Accepted Values are: 0-3 for: default, unimportant, normal, elevated, priority.
     */
    #[Json(omit_empty: true)]
    public ?TransferPriority $priority;

    /**
     * Number of outputs from the blockchain to mix with (0 means no mixing).
     */
    #[Json(omit_empty: true)]
    public ?int $mixin;

    /**
     * Number of outputs to mix in the transaction (this output + N decoys from the blockchain). (Unless dealing with pre rct outputs, this field is ignored on mainnet).
     */
    #[Json('ring_size', omit_empty: true)]
    public ?int $ringSize;

    /**
     * Number of blocks before the monero can be spent (0 to not add a lock).
     */
    #[Json('unlock_time', omit_empty: true)]
    public ?int $unlockTime;

    /**
     * Return the transaction key after sending.
     */
    #[Json('get_tx_key', omit_empty: true)]
    public ?bool $getTxKey;

    /**
     * If true, the newly created transaction will not be relayed to the monero network.
     * When omitted the default value is false
     */
    #[Json('do_not_relay', omit_empty: true)]
    public ?bool $doNotRelay;

    /**
     * Return the transaction as hex string after sending
     * When omitted the default value is false
     */
    #[Json('get_tx_hex', omit_empty: true)]
    public ?bool $getTxHex;

    /**
     * Return the metadata needed to relay the transaction.
     * When omitted the default value is false
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
        ?TransferPriority $priority = null,
        ?int $mixin = null,
        ?int $ringSize = null,
        ?int $unlockTime = null,
        ?bool $getTxKey = null,
        ?bool $doNotRelay = null,
        ?bool $getTxHex = null,
        ?bool $getTxMetadata = null,
    ): RpcRequest {
        $self = new self();
        $self->destinations = $destinations;
        $self->accountIndex = $accountIndex;
        $self->subaddrIndices = $subaddrIndices;
        $self->priority = $priority;
        $self->mixin = $mixin;
        $self->ringSize = $ringSize;
        $self->unlockTime = $unlockTime;
        $self->getTxKey = $getTxKey;
        $self->doNotRelay = $doNotRelay;
        $self->getTxHex = $getTxHex;
        $self->getTxMetadata = $getTxMetadata;
        return new RpcRequest('transfer', $self);
    }
}
