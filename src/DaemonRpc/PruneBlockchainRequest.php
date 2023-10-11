<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

class PruneBlockchainRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * If set to `true` then pruning status is checked instead of initiating pruning.
     * When omitted the default value is false
     */
    #[Json(omit_empty: true)]
    public ?bool $check;

    public static function create(?bool $check = null): RpcRequest
    {
        $self = new self();
        $self->check = $check;
        return new RpcRequest('prune_blockchain', $self);
    }
}
