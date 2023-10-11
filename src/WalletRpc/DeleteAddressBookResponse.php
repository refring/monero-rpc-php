<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Delete an entry from the address book.
 */
class DeleteAddressBookResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
