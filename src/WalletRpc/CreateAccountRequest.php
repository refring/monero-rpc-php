<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Create a new account with an optional label.Alias: *None*.
 */
class CreateAccountRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * (Optional) Label for the account.
     */
    #[Json(omit_empty: true)]
    public ?string $label;


    public static function create(?string $label = null): RpcRequest
    {
        $self = new self();
        $self->label = $label;
        return new RpcRequest('create_account', $self);
    }
}
