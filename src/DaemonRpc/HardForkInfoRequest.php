<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Look up information regarding hard fork voting and readiness.Alias: *None*.
 */
class HardForkInfoRequest
{
	public static function create(): RpcRequest
	{
		return new RpcRequest('hard_fork_info');
	}
}
