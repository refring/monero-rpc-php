<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Rescan the blockchain for spent outputs.Alias: *None*.
 */
class RescanSpentRequest
{
	public static function create(): RpcRequest
	{
		return new RpcRequest('rescan_spent');
	}
}
