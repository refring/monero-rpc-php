<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Return the wallet's balance.
 */
class GetBalanceRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * Return balance for this account.
     */
    #[Json('account_index')]
    public int $accountIndex;

    /**
     * @var ?int[] Return balance detail for those subaddresses.
     */
    #[Json('address_indices', omit_empty: true)]
    public ?array $addressIndices;

    /**
     * (Defaults to false)
     */
    #[Json('all_accounts', omit_empty: true)]
    public ?bool $allAccounts;

    /**
     * (Defaults to false) all changes go to 0-th subaddress (in the current subaddress account)
     */
    #[Json(omit_empty: true)]
    public ?bool $strict;

    /**
     * @param ?int[] $addressIndices
     */
    public static function create(
        int $accountIndex,
        ?array $addressIndices = null,
        ?bool $allAccounts = null,
        ?bool $strict = null,
    ): RpcRequest {
        $self = new self();
        $self->accountIndex = $accountIndex;
        $self->addressIndices = $addressIndices;
        $self->allAccounts = $allAccounts;
        $self->strict = $strict;
        return new RpcRequest('get_balance', $self);
    }
}
