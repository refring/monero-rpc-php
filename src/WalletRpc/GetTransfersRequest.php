<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Returns a list of transfers.<p style="color:red;"><b>WARNING</b> Verify that the transfer has a sane <code>unlock_time</code> otherwise the funds might be inaccessible.</p>
 */
class GetTransfersRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * When omitted the default value is false
     */
    #[Json(omit_empty: true)]
    public ?bool $in;

    /**
     * Include outgoing transfers.
     * When omitted the default value is false
     */
    #[Json(omit_empty: true)]
    public ?bool $out;

    /**
     * Include pending transfers.
     * When omitted the default value is false
     */
    #[Json(omit_empty: true)]
    public ?bool $pending;

    /**
     * Include failed transfers.
     * When omitted the default value is false
     */
    #[Json(omit_empty: true)]
    public ?bool $failed;

    /**
     * Include transfers from the daemon's transaction pool.
     * When omitted the default value is false
     */
    #[Json(omit_empty: true)]
    public ?bool $pool;

    /**
     * Filter transfers by block height.
     */
    #[Json('filter_by_height', omit_empty: true)]
    public ?bool $filterByHeight;

    /**
     * Minimum block height to scan for transfers, if filtering by height is enabled.
     */
    #[Json('min_height', omit_empty: true)]
    public ?int $minHeight;

    /**
     * Maximum block height to scan for transfers, if filtering by height is enabled.
     * When omitted the default value is max block height
     */
    #[Json('max_height', omit_empty: true)]
    public ?int $maxHeight;

    /**
     * Index of the account to query for transfers.
     * When omitted the default value is 0
     */
    #[Json('account_index', omit_empty: true)]
    public ?int $accountIndex;

    /**
     * @var ?int[] List of subaddress indices to query for transfers. .
     * When omitted the default value is []
     */
    #[Json('subaddr_indices', omit_empty: true)]
    public ?array $subaddrIndices;

    /**
     * .
     * When omitted the default value is false
     */
    #[Json('all_accounts', omit_empty: true)]
    public ?bool $allAccounts;

    /**
     * @param ?int[] $subaddrIndices
     */
    public static function create(
        bool $in = false,
        bool $out = false,
        bool $pending = false,
        bool $failed = false,
        bool $pool = false,
        ?bool $filterByHeight = null,
        ?int $minHeight = null,
        ?int $maxHeight = null,
        ?int $accountIndex = null,
        ?array $subaddrIndices = [],
        ?bool $allAccounts = null,
    ): RpcRequest {
        $self = new self();
        $self->in = $in;
        $self->out = $out;
        $self->pending = $pending;
        $self->failed = $failed;
        $self->pool = $pool;
        $self->filterByHeight = $filterByHeight;
        $self->minHeight = $minHeight;
        $self->maxHeight = $maxHeight;
        $self->accountIndex = $accountIndex;
        $self->subaddrIndices = $subaddrIndices;
        $self->allAccounts = $allAccounts;
        return new RpcRequest('get_transfers', $self);
    }
}
