<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Trait\StringResultTrait;
use Square\Pjson\JsonDataSerializable;

/**
 * Look up a block's hash by its height.
 */
class OnGetBlockHashResponse implements JsonDataSerializable
{
    use StringResultTrait;
}
