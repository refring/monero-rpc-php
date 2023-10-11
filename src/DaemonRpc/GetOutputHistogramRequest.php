<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get a histogram of output amounts. For all amounts (possibly filtered by parameters), gives the number of outputs on the chain for that amount.RingCT outputs counts as 0 amount.
 */
class GetOutputHistogramRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * @var int[] list of unsigned int
     */
    #[Json]
    public array $amounts;

    #[Json('min_count', omit_empty: true)]
    public ?int $minCount;

    #[Json('max_count', omit_empty: true)]
    public ?int $maxCount;

    #[Json(omit_empty: true)]
    public ?bool $unlocked;

    #[Json('recent_cutoff', omit_empty: true)]
    public ?int $recentCutoff;

    /**
     * @param int[] $amounts
     */
    public static function create(
        array $amounts,
        ?int $minCount = null,
        ?int $maxCount = null,
        ?bool $unlocked = null,
        ?int $recentCutoff = null,
    ): RpcRequest {
        $self = new self();
        $self->amounts = $amounts;
        $self->minCount = $minCount;
        $self->maxCount = $maxCount;
        $self->unlocked = $unlocked;
        $self->recentCutoff = $recentCutoff;
        return new RpcRequest('get_output_histogram', $self);
    }
}
