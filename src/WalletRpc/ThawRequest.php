<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Thaw a single output by key image so it may be used again
 */
class ThawRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json('key_image')]
    public string $keyImage;

    public static function create(string $keyImage): RpcRequest
    {
        $self = new self();
        $self->keyImage = $keyImage;
        return new RpcRequest('thaw', $self);
    }
}
