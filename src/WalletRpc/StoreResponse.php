<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Save the wallet file.
 */
class StoreResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
