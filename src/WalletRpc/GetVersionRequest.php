<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Get RPC version Major & Minor integer-format, where Major is the first 16 bits and Minor the last 16 bits.Alias: *None*.
 */
class GetVersionRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_version');
    }
}
