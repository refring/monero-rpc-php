<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use RefRing\MoneroRpcPhp\Trait\EmptyOtherRpcRequest;

/**
 * Get daemon bandwidth limits.
 */
class GetLimitRequest extends OtherRpcRequest
{
    use EmptyOtherRpcRequest;
}
