<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Check if a wallet is a multisig one.Alias: *None*.
 */
class IsMultisigRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('is_multisig');
    }
}
