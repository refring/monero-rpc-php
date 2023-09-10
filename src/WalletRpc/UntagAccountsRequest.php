<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Remove filtering tag from a list of accounts.Alias: *None*.
 */
class UntagAccountsRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * @var int[] Remove tag from this list of accounts.
     */
    #[Json]
    public array $accounts;


    /**
     * @param int[] $accounts
     */
    public static function create(array $accounts): RpcRequest
    {
        $self = new self();
        $self->accounts = $accounts;
        return new RpcRequest('untag_accounts', $self);
    }
}
