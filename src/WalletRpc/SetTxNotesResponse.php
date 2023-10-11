<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Set arbitrary string notes for transactions.
 */
class SetTxNotesResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
