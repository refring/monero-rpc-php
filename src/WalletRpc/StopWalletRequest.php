<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Store the current state of any open wallet and exit the monero-wallet-rpc process.
 */
class StopWalletRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('stop_wallet');
    }
}
