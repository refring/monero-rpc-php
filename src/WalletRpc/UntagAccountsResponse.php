<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Remove filtering tag from a list of accounts.
 */
class UntagAccountsResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
