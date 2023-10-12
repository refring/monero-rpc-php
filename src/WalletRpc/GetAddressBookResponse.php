<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use RefRing\MoneroRpcPhp\WalletRpc\Model\AddressBookEntry;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Retrieves entries from the address book.
 */
class GetAddressBookResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /** @var AddressBookEntry[] */
    #[Json(type: AddressBookEntry::class)]
    public array $entries = [];
}
