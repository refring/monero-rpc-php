<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get string notes for transactions.
 */
class GetTxNotesResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * @var string[] notes for the transactions
     */
    #[Json]
    public array $notes = [];
}
