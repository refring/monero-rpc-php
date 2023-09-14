<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get transaction secret key from transaction id.
 */
class GetTxKeyResponse
{
    use JsonSerialize;

    /**
     * Amount of the transaction.
     */
    #[Json]
    public int $received;

    /**
     * States if the transaction is still in pool or has been added to a block.
     */
    #[Json('in_pool')]
    public bool $inPool;

    /**
     * transaction secret key.
     */
    #[Json('tx_key')]
    public string $txKey;
}
