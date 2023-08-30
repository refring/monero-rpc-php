<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Send monero to a number of recipients.Alias: *None*.
 */
class TransferRequest implements ParameterInterface
{
    use JsonSerialize;

    /** @var TransferDestination[] */
    #[Json]
    public array $destinations;

    /**
     * (Optional) Transfer from this account index. (Defaults to 0)
     */
    #[Json('account_index', omit_empty: true)]
    public ?int $accountIndex;

    /**
     * @var int[] (Optional) Transfer from this set of subaddresses. (Defaults to empty - all indices)
     */
    #[Json('subaddr_indices', omit_empty: true)]
    public ?array $subaddrIndices;

    /**
     * (Optional) Set a priority for the transaction. Accepted Values are: 0-3 for: default, unimportant, normal, elevated, priority.
     */
    #[Json(omit_empty: true)]
    public ?int $priority;

    /**
     * (Optional) Number of outputs from the blockchain to mix with (0 means no mixing).
     */
    #[Json(omit_empty: true)]
    public ?int $mixin;

    /**
     * (Optional) Number of outputs to mix in the transaction (this output + N decoys from the blockchain). (Unless dealing with pre rct outputs, this field is ignored on mainnet).
     */
    #[Json('ring_size', omit_empty: true)]
    public ?int $ringSize;

    /**
     * (Optional)  Number of blocks before the monero can be spent (0 to not add a lock).
     */
    #[Json('unlock_time', omit_empty: true)]
    public ?int $unlockTime;

    /**
     * (Optional) Return the transaction key after sending.
     */
    #[Json('get_tx_key', omit_empty: true)]
    public ?bool $getTxKey;

    /**
     * (Optional) If true, the newly created transaction will not be relayed to the monero network. (Defaults to false)
     */
    #[Json('do_not_relay', omit_empty: true)]
    public ?bool $doNotRelay;

    /**
     * Return the transaction as hex string after sending (Defaults to false)
     */
    #[Json('get_tx_hex', omit_empty: true)]
    public ?bool $getTxHex;

    /**
     * Return the metadata needed to relay the transaction. (Defaults to false)
     */
    #[Json('get_tx_metadata', omit_empty: true)]
    public ?bool $getTxMetadata;


    public static function create(
        array $destinations,
        ?int $accountIndex = 0,
        ?array $subaddrIndices = [],
        ?int $priority = null,
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
