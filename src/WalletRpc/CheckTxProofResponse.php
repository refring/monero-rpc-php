<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Prove a transaction by checking its signature.
 */
class CheckTxProofResponse
{
    use JsonSerializeBigInt;

    /**
     * Number of block mined after the one with the transaction.
     */
    #[Json]
    public int $confirmations;

    /**
     * States if the inputs proves the transaction.
     */
    #[Json]
    public bool $good;

    /**
     * States if the transaction is still in pool or has been added to a block.
     */
    #[Json('in_pool')]
    public bool $inPool;

    /**
     * Amount of the transaction.
     */
    #[Json]
    public int $received;
}
