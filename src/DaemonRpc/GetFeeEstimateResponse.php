<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Gives an estimation on fees per byte.
 */
class GetFeeEstimateResponse
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

    /**
     * Amount of fees estimated per byte in piconero
     */
    #[Json]
    public int $fee;

    /**
     * @var int[] Represents the base fees at different priorities [slow, normal, fast, fastest].
     */
    #[Json]
    public array $fees;

    /**
     * Final fee should be rounded up to an even multiple of this value
     */
    #[Json('quantization_mask')]
    public int $quantizationMask;
}
