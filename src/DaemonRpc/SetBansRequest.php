<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\Node;
use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Ban another node by IP.Alias: *None*.
 */
class SetBansRequest implements ParameterInterface
{
    use JsonSerialize;

    /** @var Node[] */
    #[Json]
    public array $bans;


    public static function create(array $bans): RpcRequest
    {
        $self = new self();
        $self->bans = $bans;
        return new RpcRequest('set_bans', $self);
    }
}
