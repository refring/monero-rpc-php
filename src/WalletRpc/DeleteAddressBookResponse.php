<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\JsonSerialize;

/**
 * Delete an entry from the address book.
 */
class DeleteAddressBookResponse
{
    use JsonSerialize;
}
