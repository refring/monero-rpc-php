<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Prepare a wallet for multisig by generating a multisig string to share with peers.Alias: *None*.
 */
class PrepareMultisigRequest
{
	public static function create(): RpcRequest
	{
		return new RpcRequest('prepare_multisig');
	}
}
