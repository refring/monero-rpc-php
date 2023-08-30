<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Sign a string.Alias: *None*.
 */
class SignRequest implements ParameterInterface
{
	use JsonSerialize;

	/**
	 * Anything you need to sign.
	 */
	#[Json]
	public string $data;


	public static function create(string $data): RpcRequest
	{
		$self = new self();
		$self->data = $data;
		return new RpcRequest('sign', $self);
	}
}
