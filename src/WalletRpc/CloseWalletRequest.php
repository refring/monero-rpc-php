<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Close the currently opened wallet, after trying to save it.Alias: *None*.
 */
class CloseWalletRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('close_wallet');
    }
}
