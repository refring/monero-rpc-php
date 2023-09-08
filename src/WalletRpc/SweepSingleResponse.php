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
     * array of integer. The amount transferred for every transaction.
     */
    #[Json]
    public int $amount;

    /**
     * @var string[] Key images of spent outputs.
     */
    #[Json('spent_key_images')]
    public array $spentKeyImages;

    /**
     * array of integer. The amount of fees paid for every transaction.
     */
    #[Json]
    public int $fee;


    /**
     * string. The set of signing keys used in a multisig transaction (empty for non-multisig).
     */
    #[Json('multisig_txset')]
    public string $multisigTxset;


    /**
     * array of string. The tx as hex string for every transaction.
     */
    #[Json('tx_blob')]
    public string $txBlob;

    /**
     * array of string. The tx hashes of every transaction.
     */
    #[Json('tx_hash')]
    public string $txHash;

    /**
     * array of string. The transaction keys for every transaction.
     */
    #[Json('tx_key')]
    public string $txKey;

    /**
     * string. Transaction metadata needed to relay the transactions later.
     */
    #[Json('tx_metadata')]
    public string $txMetadata;

    /**
     * string. Set of unsigned tx for cold-signing purposes.
     */
    #[Json('unsigned_txset')]
    public string $unsignedTxset;

    /**
     * Metric used to calculate transaction fee.
     */
    #[Json]
    public int $weight;
}
