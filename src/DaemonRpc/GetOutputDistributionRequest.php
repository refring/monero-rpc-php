<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Alias: *None*.
 */
class GetOutputDistributionRequest implements ParameterInterface
{
	use JsonSerialize;

	/**
	 * amounts to look for
	 */
	#[Json]
	public array $amounts;

	/**
	 * (optional, default is `false`) States if the result should be cumulative (`true`) or not (`false`)
	 */
	#[Json(omit_empty: true)]
	public ?bool $cumulative;

	/**
	 * (optional, default is 0) starting height to check from
	 */
	#[Json('from_height', omit_empty: true)]
	public ?int $fromHeight;

	/**
	 * (optional, default is 0) ending height to check up to
	 */
	#[Json('to_height', omit_empty: true)]
	public ?int $toHeight;


	public static function create(
		array $amounts,
		?bool $cumulative = null,
		?int $fromHeight = null,
		?int $toHeight = null,
	): RpcRequest
	{
		$self = new self();
		$self->amounts = $amounts;
		$self->cumulative = $cumulative;
		$self->fromHeight = $fromHeight;
		$self->toHeight = $toHeight;
		return new RpcRequest('get_output_distribution', $self);
	}
}
