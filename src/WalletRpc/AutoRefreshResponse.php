<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Set whether and how often to automatically refresh the current wallet.
 */
class AutoRefreshResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
