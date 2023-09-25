<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 *
 */
class PruneBlockchainRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * Optional (`false` by default) - If set to `true` then pruning status is checked instead of initiating pruning.
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
