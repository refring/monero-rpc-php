<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get a histogram of output amounts. For all amounts (possibly filtered by parameters), gives the number of outputs on the chain for that amount.RingCT outputs counts as 0 amount.
 */
class GetOutputHistogramRequest implements ParameterInterface
{
	use JsonSerialize;

	/**
	 * @var int[] list of unsigned int
	 */
	#[Json]
	public array $amounts;

	/**
	 * (Optional)
	 */
	#[Json('min_count', omit_empty: true)]
	public ?int $minCount;

	/**
	 * (Optional)
	 */
	#[Json('max_count', omit_empty: true)]
	public ?int $maxCount;

	/**
	 * (Optional)
	 */
	#[Json(omit_empty: true)]
	public ?bool $unlocked;

	/**
	 * (Optional)
	 */
	#[Json('recent_cutoff', omit_empty: true)]
	public ?int $recentCutoff;


	public static function create(
		array $amounts,
		?int $minCount = null,
		?int $maxCount = null,
		?bool $unlocked = null,
		?int $recentCutoff = null,
	): RpcRequest
	{
		$self = new self();
		$self->amounts = $amounts;
		$self->minCount = $minCount;
		$self->maxCount = $maxCount;
		$self->unlocked = $unlocked;
		$self->recentCutoff = $recentCutoff;
		return new RpcRequest('get_output_histogram', $self);
	}
}
