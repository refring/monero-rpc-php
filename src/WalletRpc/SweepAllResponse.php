<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Send all unlocked balance to an address.Alias: *None*.
 */
class SweepAllResponse
{
    use JsonSerialize;

    /**
     * @var int[] The amount transferred for every transaction.
     */
    #[Json('amount_list')]
    public array $amountList;

    /**
     * @var int[] The amount of fees paid for every transaction.
     */
    #[Json('fee_list')]
    public array $feeList;

    /**
     * The set of signing keys used in a multisig transaction (empty for non-multisig).
     */
    #[Json('multisig_txset')]
    public string $multisigTxset;

    /**
     * @var string[] Key images of spent outputs.
     */
    #[Json('spent_key_images_list')]
    public array $spentKeyImagesList;

    /**
     * @var string[] The tx hashes of every transaction.
     */
    #[Json('tx_hash_list')]
    public array $txHashList;

    /**
     * @var string[] The transaction keys for every transaction.
     */
    #[Json('tx_key_list')]
    public array $txKeyList;

    /**
     * Set of unsigned tx for cold-signing purposes.
     */
    #[Json('unsigned_txset')]
    public string $unsignedTxset;

    /**
     * @var int[] Metric used for adjusting fee.
     */
    #[Json('weight_list')]
    public array $weightList;

    /**
     * @var string[] The tx as hex string for every transaction.
     */
    #[Json('tx_blob_list')]
    public array $txBlobList;

    /**
     * @var string[] List of transaction metadata needed to relay the transactions later.
     */
    #[Json('tx_metadata_list')]
    public array $txMetadataList;
}
