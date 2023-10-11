<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Apply a filtering tag to a list of accounts.
 */
class TagAccountsResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
