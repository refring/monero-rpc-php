<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Trait\StringResultTrait;

/**
 * Look up a block's hash by its height.Alias: *on_getblockhash*.
 */
class OnGetBlockHashResponse
{
	use StringResultTrait;
}
