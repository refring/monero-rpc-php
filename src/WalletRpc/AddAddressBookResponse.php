<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Add an entry to the address book.
 */
class AddAddressBookResponse
{
    use JsonSerializeBigInt;

    /**
     * The index of the address book entry.
     */
    #[Json]
    public int $index;
}
