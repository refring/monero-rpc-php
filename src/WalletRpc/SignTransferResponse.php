<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Sign a transaction created on a read-only wallet (in cold-signing process)Alias: *None*.
 */
class SignTransferResponse
{
    use JsonSerialize;

    /**
     * Set of signed tx to be used for submitting transfer.
     */
    #[Json('signed_txset')]
    public string $signedTxset;

    /**
     * @var string[] The tx hashes of every transaction.
     *
     */
    #[Json('tx_hash_list')]
    public array $txHashList;
}
