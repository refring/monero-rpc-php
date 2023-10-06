<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Create a new account with an optional label.
 */
class CreateAccountRequest implements ParameterInterface
{
    use JsonSerializeBigInt;

    /**
     * Label for the account.
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
