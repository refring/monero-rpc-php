<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Change a wallet password.
 */
class ChangeWalletPasswordResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
