<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Stop mining in the Monero daemon.
 */
class StopMiningResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
