<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Display alternative chains seen by the node.Alias: *None*.
 */
class GetAlternateChainsRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_alternate_chains');
    }
}
