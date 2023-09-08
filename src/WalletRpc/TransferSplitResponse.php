<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Same as transfer, but can split into more than one tx if necessary.Alias: *None*.
 */
class TransferSplitResponse
{
    use JsonSerialize;

    /**
     * array of integer. The amount transferred for every transaction.
     * @var int[]
     */
    #[Json('amount_list')]
    public array $amountList;

    /**
     * array of integer. The amount of fees paid for every transaction.
     * @var int[]
     */
    #[Json('fee_list')]
    public array $feeList;

    /**
     * array of integer. Metric used to calculate transaction fee.
     * @var int[]
     */
    #[Json('weight_list')]
    public array $weightList;

    /**
     * string. The set of signing keys used in a multisig transaction (empty for non-multisig).
     */
    #[Json('multisig_txset')]
    public string $multisigTxset;

    /**
     * array of string. The tx hashes of every transaction.
     * @var string[]
     */
    #[Json('tx_hash_list')]
    public array $txHashList;

    /**
     * array of string. The transaction keys for every transaction.
     * @var string[]
     */
    #[Json('tx_key_list')]
    public array $txKeyList;

    /**
     * array of string. The tx as hex string for every transaction.
     * @var string[]
     */
    #[Json('tx_blob_list')]
    public array $txBlobList;

    /**
     * array of string. List of transaction metadata needed to relay the transactions later.
     * @var string[]
     */
    #[Json('tx_metadata_list')]
    public array $txMetadataList;

    /**
     * string. Set of unsigned tx for cold-signing purposes.
     */
    #[Json('unsigned_txset')]
    public string $unsignedTxset;

    /**
     * array of string. Key images of spent outputs.
     */
    #[Json('spent_key_images_list')]
    public array $spentKeyImagesList;
}
