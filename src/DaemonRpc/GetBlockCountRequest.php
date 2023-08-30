<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Look up how many blocks are in the longest chain known to the node.Alias: *getblockcount*.
 */
class GetBlockCountRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_block_count');
    }
}
