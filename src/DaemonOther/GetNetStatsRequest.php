<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;

/**
 * Get some networking information from the daemon
 */
class GetNetStatsRequest extends OtherRpcRequest
{
    public static function create(): OtherRpcRequest
    {
        return new self();
    }

    public function toJson(int $flags = 0, int $depth = 512): string
    {
        return "";
    }
}
