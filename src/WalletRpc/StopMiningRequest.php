<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Stop mining in the Monero daemon.Alias: *None*.
 */
class StopMiningRequest
{
	public static function create(): RpcRequest
	{
		return new RpcRequest('stop_mining');
	}
}
