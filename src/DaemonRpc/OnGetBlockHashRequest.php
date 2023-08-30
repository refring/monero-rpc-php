<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use RefRing\MoneroRpcPhp\Trait\CollectionTrait;

/**
 * Look up a block's hash by its height.Alias: *on_getblockhash*.
 */
class OnGetBlockHashRequest implements ParameterInterface, \IteratorAggregate
{
	use CollectionTrait;

	public static function create(array $values): RpcRequest
	{
		$self = new self();
		$self->values = $values;
		return new RpcRequest('on_get_block_hash', $self);
	}
}
