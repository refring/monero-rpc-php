<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Set the subaddress lookahead depth for scanning.
 */
class SetSubaddressLookaheadResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
