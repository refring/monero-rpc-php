<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Export multisig info for other participants.Alias: *None*.
 */
class ExportMultisigInfoRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('export_multisig_info');
    }
}
