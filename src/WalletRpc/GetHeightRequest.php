<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Returns the wallet's current block height.Alias: *getheight*.
 */
class GetHeightRequest
{
	public static function create(): RpcRequest
	{
		return new RpcRequest('get_height');
	}
}
