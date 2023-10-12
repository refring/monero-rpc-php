<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\DaemonRpc\Model\Node;
use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Ban another node by IP.
 */
class SetBansRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /** @var Node[] */
    #[Json]
    public array $bans;

    /**
     * @param Node[] $bans
     */
    public static function create(array $bans): RpcRequest
    {
        $self = new self();
        $self->bans = $bans;
        return new RpcRequest('set_bans', $self);
    }
}
