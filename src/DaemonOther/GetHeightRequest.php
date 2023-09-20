<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use RefRing\MoneroRpcPhp\Trait\EmptyOtherRpcRequest;

/**
 * Get the node's current height
 */
class GetHeightRequest extends OtherRpcRequest
{
    use EmptyOtherRpcRequest;
}
