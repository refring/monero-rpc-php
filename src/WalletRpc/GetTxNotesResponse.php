<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get string notes for transactions.
 */
class GetTxNotesResponse
{
    use JsonSerialize;

    /**
     * @var string[] notes for the transactions
     */
    #[Json]
    public array $notes;
}
