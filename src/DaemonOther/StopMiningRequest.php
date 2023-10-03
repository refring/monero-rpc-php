<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use RefRing\MoneroRpcPhp\Trait\EmptyOtherRpcRequest;

/**
 * Stop mining on the daemon.
 */
class StopMiningRequest extends OtherRpcRequest
{
    use EmptyOtherRpcRequest;
}
