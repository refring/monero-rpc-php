<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\KeyImageList;
use RefRing\MoneroRpcPhp\Monero\Amount;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use RefRing\MoneroRpcPhp\WalletRpcClient;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Same as @see WalletRpcClient::transfer(), but can split into more than one tx if necessary..
 */
class TransferSplitResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * @var Amount[] The amount transferred for every transaction.
     */
    #[Json('amount_list', type: Amount::class)]
    public array $amountList = [];

    /**
     * @var Amount[] The amount of fees paid for every transaction.
     */
    #[Json('fee_list', type: Amount::class)]
    public array $feeList = [];

    /**
     * string. The set of signing keys used in a multisig transaction (empty for non-multisig).
     */
    #[Json('multisig_txset')]
    public string $multisigTxset;

    /**
     * @var KeyImageList[] Key images of spent outputs.
     */
    #[Json('spent_key_images_list', type:KeyImageList::class)]
    public array $spentKeyImagesList = [];

    /**
     * @var string[] The tx hashes of every transaction.
     */
    #[Json('tx_hash_list')]
    public array $txHashList = [];

    /**
     * @var string[] The transaction keys for every transaction.
     */
    #[Json('tx_key_list')]
    public array $txKeyList = [];

    /**
     * @var string[] The tx as hex string for every transaction.
     */
    #[Json('tx_blob_list')]
    public array $txBlobList = [];

    /**
     * @var string[] List of transaction metadata needed to relay the transactions later.
     */
    #[Json('tx_metadata_list')]
    public array $txMetadataList = [];

    /**
     * string. Set of unsigned tx for cold-signing purposes.
     */
    #[Json('unsigned_txset')]
    public string $unsignedTxset;

    /**
     * @var int[] Metric used to calculate transaction fee.
     */
    #[Json('weight_list')]
    public array $weightList = [];
}
