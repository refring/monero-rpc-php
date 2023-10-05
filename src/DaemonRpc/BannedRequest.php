<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Check if an IP address is banned and for how long.
 */
class BannedRequest implements ParameterInterface
{
    use JsonSerialize;

    #[Json]
    public string $address;

    public static function create(string $address): RpcRequest
    {
        $self = new self();
        $self->address = $address;
        return new RpcRequest('banned', $self);
    }
}
