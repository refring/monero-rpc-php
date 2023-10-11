<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Start mining in the Monero daemon.
 */
class StartMiningResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
