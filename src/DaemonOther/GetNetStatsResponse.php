<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonBaseResponse;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class GetNetStatsResponse extends DaemonBaseResponse
{
    use JsonSerialize;

    /**
     * Unix start time.
     */
    #[Json('start_time')]
    public int $startTime;

    #[Json('total_packets_in')]
    public int $totalPacketsIn;

    #[Json('total_bytes_in')]
    public int $totalBytesIn;

    #[Json('total_packets_out')]
    public int $totalPacketsOut;

    #[Json('total_bytes_out')]
    public int $totalBytesOut;
}
