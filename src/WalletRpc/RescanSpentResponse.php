<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Rescan the blockchain for spent outputs.
 */
class RescanSpentResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
