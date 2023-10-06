<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

class GetNetStatsResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

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
