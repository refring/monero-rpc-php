<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Edit an existing address book entry.Alias: *None*
 */
class EditAddressBookResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
