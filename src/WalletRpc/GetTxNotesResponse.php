<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get string notes for transactions.Alias: *None*.
 */
class GetTxNotesResponse
{
    use JsonSerialize;

    /**
     * notes for the transactions
     * @var string[]
     */
    #[Json]
    public array $notes;
}
