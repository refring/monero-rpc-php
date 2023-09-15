<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Give the node current version
 */
class GetVersionRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_version');
    }
}
