<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get all accounts for a wallet. Optionally filter accounts by tag.Alias: *None*.
 */
class GetAccountsRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * (Optional) Tag for filtering accounts.
     */
    #[Json(omit_empty: true)]
    public ?string $tag;

    /**
     * (Optional) allow regular expression filters if set to true (Defaults to false).
     */
    #[Json(omit_empty: true)]
    public ?bool $regex;

    /**
     * (Optional) when `true`, balance only considers the blockchain, when `false` it considers both the blockchain and some recent actions, such as a recently created transaction which spent some outputs, which isn't yet mined.
     */
    #[Json('strict_balances', omit_empty: true)]
    public ?bool $strictBalances;


    public static function create(?string $tag = null, ?bool $regex = null, ?bool $strictBalances = null): RpcRequest
    {
        $self = new self();
        $self->tag = $tag;
        $self->regex = $regex;
        $self->strictBalances = $strictBalances;
        return new RpcRequest('get_accounts', $self);
    }
}
