<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Send all unlocked balance to an address.Alias: *None*.
 */
class SweepAllRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * Destination public address.
     */
    #[Json]
    public string $address;

    /**
     * (Optional) Sweep transactions from this account.
     */
    #[Json('account_index', omit_empty: true)]
    public ?int $accountIndex;

    /**
     * @var int[] (Optional) Sweep from this set of subaddresses in the account.
     */
    #[Json('subaddr_indices', omit_empty: true)]
    public ?array $subaddrIndices;

    /**
     * (Optional) use outputs in all subaddresses within an account (Defaults to false).
     */
    #[Json('subaddr_indices_all', omit_empty: true)]
    public ?bool $subaddrIndicesAll;

    /**
     * (Optional) Priority for sending the sweep transfer, partially determines fee.
     */
    #[Json(omit_empty: true)]
    public ?int $priority;

    /**
     * specify the number of separate outputs of smaller denomination that will be created by sweep operation.
     */
    #[Json]
    public int $outputs;

    /**
     * Sets ringsize to n (mixin + 1). (Unless dealing with pre rct outputs, this field is ignored on mainnet).
     */
    #[Json('ring_size')]
    public int $ringSize;

    /**
     * Number of blocks before the monero can be spent (0 to not add a lock).
     */
    #[Json('unlock_time')]
    public int $unlockTime;

    /**
     * (Optional, defaults to a random ID) 16 characters hex encoded.
     */
    #[Json('payment_id', omit_empty: true)]
    public ?string $paymentId;

    /**
     * (Optional) Return the transaction keys after sending.
     */
    #[Json('get_tx_keys', omit_empty: true)]
    public ?bool $getTxKeys;

    /**
     * (Optional) Include outputs below this amount.
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
     * (Optional) return the transaction metadata as a string. (Defaults to false)
     */
    #[Json('get_tx_metadata', omit_empty: true)]
    public ?bool $getTxMetadata;


    public static function create(
        string $address,
        ?int $accountIndex = null,
        ?array $subaddrIndices = null,
        ?bool $subaddrIndicesAll = null,
        ?int $priority = null,
        int $outputs,
        int $ringSize,
        int $unlockTime,
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
