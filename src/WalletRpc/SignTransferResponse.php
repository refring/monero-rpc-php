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
     * string. Set of signed tx to be used for submitting transfer.
     */
    #[Json('signed_txset')]
    public string $signedTxset;

    /**
     * array of string. The tx hashes of every transaction.
     */
    #[Json('tx_hash_list')]
    public string $txHashList;

    /**
     * array of string. The tx raw data of every transaction.
     */
    #[Json('tx_raw_list')]
    public string $txRawList;

    /**
     * array of string.
     */
    #[Json('tx_key_list')]
    public string $txKeyList;
}
