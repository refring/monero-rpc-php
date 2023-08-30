<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Get a list of available languages for your wallet's seed.Alias: *None*.
 */
class GetLanguagesRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_languages');
    }
}
