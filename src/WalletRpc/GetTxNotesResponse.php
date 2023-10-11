<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Get string notes for transactions.
 */
class GetTxNotesResponse
{
    use JsonSerializeBigInt;

    /**
     * @var string[] notes for the transactions
     */
    #[Json]
    public array $notes = [];
}
