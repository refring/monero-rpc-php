<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Model\GetTransactionsEntry;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;

/**
 * Look up one or more transactions by hash.
 */
class GetTransactionsResponse
{
    use JsonSerializeBigInt;

    /**
     * @var string[] Transaction hashes that could not be found.
     */
    #[Json('missed_tx', omit_empty: true)]
    public array $missedTx = [];

    /** @var GetTransactionsEntry[] */
    #[Json(type: GetTransactionsEntry::class)]
    public array $txs;
}
