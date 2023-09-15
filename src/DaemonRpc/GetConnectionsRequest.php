<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Retrieve information about incoming and outgoing connections to your node.
 */
class GetConnectionsRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_connections');
    }
}
