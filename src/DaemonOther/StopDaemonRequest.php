<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use RefRing\MoneroRpcPhp\Trait\EmptyOtherRpcRequest;

/**
 * Send a command to the daemon to safely disconnect and shut down.
 */
class StopDaemonRequest extends OtherRpcRequest
{
    use EmptyOtherRpcRequest;
}
