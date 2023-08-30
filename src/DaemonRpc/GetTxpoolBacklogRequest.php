<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Get all transaction pool backlogAlias: *None*.
 */
class GetTxpoolBacklogRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_txpool_backlog');
    }
}
