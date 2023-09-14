<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\JsonSerialize;

/**
 * Rescan the blockchain for spent outputs.
 */
class RescanSpentResponse
{
    use JsonSerialize;
}
