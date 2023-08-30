<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Get a list of user-defined account tags.Alias: *None*.
 */
class GetAccountTagsRequest
{
	public static function create(): RpcRequest
	{
		return new RpcRequest('get_account_tags');
	}
}
