<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Get synchronisation informationsAlias: *None*.
 */
class SyncInfoRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('sync_info');
    }
}
