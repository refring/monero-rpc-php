<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Change a wallet password.
 */
class ChangeWalletPasswordRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Current wallet password, if defined.
     */
    #[Json('old_password', omit_empty: true)]
    public ?string $oldPassword;

    /**
     * New wallet password, if not blank.
     */
    #[Json('new_password', omit_empty: true)]
    public ?string $newPassword;

    public static function create(?string $oldPassword = null, ?string $newPassword = null): RpcRequest
    {
        $self = new self();
        $self->oldPassword = $oldPassword;
        $self->newPassword = $newPassword;
        return new RpcRequest('change_wallet_password', $self);
    }
}
