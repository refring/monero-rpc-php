<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Enum\ResponseStatus;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Gives an estimation on fees per byte.Alias: *None*.
 */
class GetFeeEstimateResponse
{
    use JsonSerialize;

    /**
     * If payment for RPC is enabled, the number of credits available to the requesting client. Otherwise, 0.
     */
    #[Json]
    public int $credits;

    /**
     * Amount of fees estimated per byte in @atomic-units
     */
    #[Json]
    public int $fee;

    /**
     * Represents the base fees at different priorities [slow, normal, fast, fastest].
     */
    #[Json]
    public array $fees;

    /**
     * Final fee should be rounded up to an even multiple of this value
     */
    #[Json('quantization_mask')]
    public int $quantizationMask;

    /**
     * General RPC error code. "OK" means everything looks good.
     */
    #[Json]
    public ResponseStatus $status;

    /**
     * If payment for RPC is enabled, the hash of the highest block in the chain. Otherwise, empty.
     */
    #[Json('top_hash')]
    public string $topHash;

    /**
     * States if the result is obtained using the bootstrap mode, and is therefore not trusted (`true`), or when the daemon is fully synced and thus handles the RPC locally (`false`)
     */
    #[Json]
    public bool $untrusted;
}
