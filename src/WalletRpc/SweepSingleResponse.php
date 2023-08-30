<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Send all of a specific unlocked output to an address.Alias: *None*.
 */
class SweepSingleResponse
{
    use JsonSerialize;

    /**
     * array of string. The tx hashes of every transaction.
     */
    #[Json('tx_hasht')]
    public string $txHasht;

    /**
     * array of string. The transaction keys for every transaction.
     */
    #[Json('tx_key')]
    public string $txKey;

    /**
     * array of integer. The amount transferred for every transaction.
     */
    #[Json]
    public int $amount;

    /**
     * array of integer. The amount of fees paid for every transaction.
     */
    #[Json]
    public int $fee;

    /**
     * Metric used to calculate transaction fee.
     */
    #[Json]
    public int $weight;

    /**
     * array of string. The tx as hex string for every transaction.
     */
    #[Json('tx_blob')]
    public string $txBlob;

    /**
     * string. Transaction metadata needed to relay the transactions later.
     */
    #[Json('tx_metadata')]
    public string $txMetadata;

    /**
     * string. The set of signing keys used in a multisig transaction (empty for non-multisig).
     */
    #[Json('multisig_txset')]
    public string $multisigTxset;

    /**
     * string. Set of unsigned tx for cold-signing purposes.
     */
    #[Json('unsigned_txset')]
    public string $unsignedTxset;

    /**
     * array of string. Key images of spent outputs.
     */
    #[Json('spent_key_images')]
    public string $spentKeyImages;
}
