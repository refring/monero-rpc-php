<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Set the subaddress lookahead depth for scanning.
 */
class SetSubaddressLookaheadRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json('password', omit_empty: true)]
    public ?string $password;

    #[Json('major_idx')]
    public int $major;

    #[Json('minor_idx')]
    public int $minor;

    public static function create(int $major, int $minor, ?string $password = null): RpcRequest
    {
        $self = new self();
        $self->password = $password;
        $self->major = $major;
        $self->minor = $minor;
        return new RpcRequest('set_subaddress_lookahead', $self);
    }
}
