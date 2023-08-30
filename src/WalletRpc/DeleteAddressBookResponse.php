<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Delete an entry from the address book.Alias: *None*.
 */
class DeleteAddressBookResponse
{
	use JsonSerialize;
}
