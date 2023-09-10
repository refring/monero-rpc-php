<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Trait\StringResultTrait;

/**
 * Look up a block's hash by its height.
 */
class OnGetBlockHashResponse
{
    use StringResultTrait;
}
