<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Save the wallet file.
 */
class StoreRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('store');
    }
}
