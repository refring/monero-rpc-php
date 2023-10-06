<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Delete an entry from the address book.
 */
class DeleteAddressBookResponse
{
    use JsonSerializeBigInt;
}
