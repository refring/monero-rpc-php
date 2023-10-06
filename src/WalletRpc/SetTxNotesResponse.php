<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Set arbitrary string notes for transactions.
 */
class SetTxNotesResponse
{
    use JsonSerializeBigInt;
}
