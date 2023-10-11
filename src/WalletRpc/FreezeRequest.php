<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Freeze a single output by key image so it will not be used
 */
class FreezeRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json('key_image')]
    public string $keyImage;

    public static function create(string $keyImage): RpcRequest
    {
        $self = new self();
        $self->keyImage = $keyImage;
        return new RpcRequest('freeze', $self);
    }
}
