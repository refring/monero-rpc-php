<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\JsonSerialize;

/**
 * Thaw a single output by key image so it may be used again
 */
class ThawResponse
{
    use JsonSerialize;
}
