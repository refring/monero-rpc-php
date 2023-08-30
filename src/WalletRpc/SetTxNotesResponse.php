<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Set arbitrary string notes for transactions.Alias: *None*.
 */
class SetTxNotesResponse
{
	use JsonSerialize;
}
