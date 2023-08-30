<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Add an entry to the address book.Alias: *None*.
 */
class AddAddressBookResponse
{
    use JsonSerialize;

    /**
     * The index of the address book entry.
     */
    #[Json]
    public int $index;
}
