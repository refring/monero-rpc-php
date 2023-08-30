<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Relay a list of transaction IDs.Alias: *None*.
 */
class RelayTxRequest implements ParameterInterface
{
	use JsonSerialize;

	/**
	 * @var string[] list of transaction IDs to relay
	 */
	#[Json]
	public array $txids;


	public static function create(array $txids): RpcRequest
	{
		$self = new self();
		$self->txids = $txids;
		return new RpcRequest('relay_tx', $self);
	}
}
