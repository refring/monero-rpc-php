<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get attribute value by name.Alias: *None*.
 */
class GetAttributeRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * attribute name
     */
    #[Json]
    public string $key;


    public static function create(string $key): RpcRequest
    {
        $self = new self();
        $self->key = $key;
        return new RpcRequest('get_attribute', $self);
    }
}
