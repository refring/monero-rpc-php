<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Flush bad transactions / blocks from the cache.
 */
class FlushCacheRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * Optional (`false` by default).
     */
    #[Json('bad_txs', omit_empty: true)]
    public ?bool $badTxs;

    /**
     * Optional (`false` by default).
     */
    #[Json('bad_blocks', omit_empty: true)]
    public ?bool $badBlocks;


    public static function create(?bool $badTxs = null, ?bool $badBlocks = null): RpcRequest
    {
        $self = new self();
        $self->badTxs = $badTxs;
        $self->badBlocks = $badBlocks;
        return new RpcRequest('flush_cache', $self);
    }
}
