<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use RefRing\MoneroRpcPhp\Trait\EmptyOtherRpcRequest;

/**
 * Get the known blocks hashes which are not on the main chain.
 */
class GetAltBlocksHashesRequest extends OtherRpcRequest
{
    use EmptyOtherRpcRequest;
}
