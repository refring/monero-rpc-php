<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Freeze a single output by key image so it will not be usedAlias: *None*.
 */
class FreezeRequest implements ParameterInterface
{
    use JsonSerialize;

    #[Json('key_image')]
    public string $keyImage;


    public static function create(string $keyImage): RpcRequest
    {
        $self = new self();
        $self->keyImage = $keyImage;
        return new RpcRequest('freeze', $self);
    }
}
