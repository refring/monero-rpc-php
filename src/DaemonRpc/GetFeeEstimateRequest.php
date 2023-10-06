<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Gives an estimation on fees per byte.
 */
class GetFeeEstimateRequest implements ParameterInterface
{
    use JsonSerializeBigInt;

    /**
     * Optional
     */
    #[Json('grace_blocks', omit_empty: true)]
    public ?int $graceBlocks;

    public static function create(?int $graceBlocks = null): RpcRequest
    {
        $self = new self();
        $self->graceBlocks = $graceBlocks;
        return new RpcRequest('get_fee_estimate', $self);
    }
}
