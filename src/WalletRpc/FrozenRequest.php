<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Checks whether a given output is currently frozen by key image
 */
class FrozenRequest implements ParameterInterface
{
    use JsonSerialize;

    #[Json('key_image')]
    public string $keyImage;

    public static function create(string $keyImage): RpcRequest
    {
        $self = new self();
        $self->keyImage = $keyImage;
        return new RpcRequest('frozen', $self);
    }
}
