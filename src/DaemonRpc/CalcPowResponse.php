<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Trait\StringResultTrait;
use Square\Pjson\JsonDataSerializable;

/**
 * Calculate PoW hash for a block candidate.
 */
class CalcPowResponse implements JsonDataSerializable
{
    use StringResultTrait;
}
