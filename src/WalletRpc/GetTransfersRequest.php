<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Returns a list of transfers.<p style="color:red;"><b>WARNING</b> Verify that the transfer has a sane <code>unlock_time</code> otherwise the funds might be inaccessible.</p>Alias: *None*.
 */
class GetTransfersRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * (defaults to false) Include incoming transfers.
     */
    #[Json]
    public bool $in;

    /**
     * (defaults to false) Include outgoing transfers.
     */
    #[Json]
    public bool $out;

    /**
     * (defaults to false) Include pending transfers.
     */
    #[Json]
    public bool $pending;

    /**
     * (defaults to false) Include failed transfers.
     */
    #[Json]
    public bool $failed;

    /**
     * (defaults to false) Include transfers from the daemon's transaction pool.
     */
    #[Json]
    public bool $pool;

    /**
     * (Optional) Filter transfers by block height.
     */
    #[Json('filter_by_height', omit_empty: true)]
    public ?bool $filterByHeight;

    /**
     * (Optional) Minimum block height to scan for transfers, if filtering by height is enabled.
     */
    #[Json('min_height', omit_empty: true)]
    public ?int $minHeight;

    /**
     * (Optional) Maximum block height to scan for transfers, if filtering by height is enabled (defaults to max block height).
     */
    #[Json('max_height', omit_empty: true)]
    public ?int $maxHeight;

    /**
     * (Optional) Index of the account to query for transfers. (defaults to 0)
     */
    #[Json('account_index', omit_empty: true)]
    public ?int $accountIndex;

    /**
     * @var int[] (Optional) List of subaddress indices to query for transfers. (Defaults to empty - all indices).
     */
    #[Json('subaddr_indices', omit_empty: true)]
    public ?array $subaddrIndices;

    /**
     * (Optional) (Defaults to false).
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
