<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use RefRing\MoneroRpcPhp\Trait\EmptyOtherRpcRequest;

/**
 * Get the mining status of the daemon.
 */
class MiningStatusRequest extends OtherRpcRequest
{
    use EmptyOtherRpcRequest;
}
