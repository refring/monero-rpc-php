<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Add an entry to the address book.
 */
class AddAddressBookResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * The index of the address book entry.
     */
    #[Json]
    public int $index;
}
