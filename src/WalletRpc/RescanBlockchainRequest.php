<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Rescan the blockchain from scratch, losing any information which can not be recovered from the blockchain itself.This includes destination addresses, tx secret keys, tx notes, etc.
 */
class RescanBlockchainRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('rescan_blockchain');
    }
}
