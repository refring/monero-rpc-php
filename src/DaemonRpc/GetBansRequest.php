<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Get list of banned IPs.Alias: *None*.
 */
class GetBansRequest
{
	public static function create(): RpcRequest
	{
		return new RpcRequest('get_bans');
	}
}
