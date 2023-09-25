<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Flush tx ids from transaction pool
 */
class FlushTxpoolRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * @var string[] Optional, list of transactions IDs to flush from pool (all tx ids flushed if empty).
     */
    #[Json(omit_empty: true)]
    public ?array $txids;

    /**
     * @param ?string[] $txids
     */
    public static function create(?array $txids = null): RpcRequest
    {
        $self = new self();
        $self->txids = $txids;
        return new RpcRequest('flush_txpool', $self);
    }
}
