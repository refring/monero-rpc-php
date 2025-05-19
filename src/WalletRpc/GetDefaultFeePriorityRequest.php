<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Returns the adjusted fee priority(1-4) that the auto/default(0) tier will be mapped to.
 */
class GetDefaultFeePriorityRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('get_default_fee_priority');
    }
}
