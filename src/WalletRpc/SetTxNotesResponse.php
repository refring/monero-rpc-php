<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\JsonSerialize;

/**
 * Set arbitrary string notes for transactions.
 */
class SetTxNotesResponse
{
    use JsonSerialize;
}
