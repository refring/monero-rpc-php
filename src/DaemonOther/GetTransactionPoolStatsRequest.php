<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use RefRing\MoneroRpcPhp\Trait\EmptyOtherRpcRequest;

/**
 * Get the transaction pool statistics.
 */
class GetTransactionPoolStatsRequest extends OtherRpcRequest
{
    use EmptyOtherRpcRequest;
}
