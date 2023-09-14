<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\AddressBookEntry;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Retrieves entries from the address book.
 */
class GetAddressBookResponse
{
    use JsonSerialize;

    /** @var AddressBookEntry[] */
    #[Json]
    public array $entries;
}
