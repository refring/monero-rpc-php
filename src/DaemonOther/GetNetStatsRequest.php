<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use RefRing\MoneroRpcPhp\Trait\EmptyOtherRpcRequest;

/**
 * Get some networking information from the daemon
 */
class GetNetStatsRequest extends OtherRpcRequest
{
    use EmptyOtherRpcRequest;
}
