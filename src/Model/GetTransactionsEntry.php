<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;

class GetTransactionsEntry
{
    use JsonSerializeBigInt{
        fromJsonData as fromJsonDataOriginal;
    }

    /**
     * Full transaction information as a hex string.
     */
    #[Json('as_hex')]
    public string $asHex;

    /**
     * List of transaction info
     */
    public string $asJson;

    /**
     * @var TransactionData The transaction information as an object
     */
    public TransactionData $transaction;

    /**
     * block height including the transaction
     */
    #[Json('block_height')]
    public int $blockHeight;

    /**
     * Unix time at chich the block has been added to the blockchain
     */
    #[Json('block_timestamp')]
    public int $blockTimestamp;

    /**
     * Number of confirmations
     */
    #[Json]
    public int $confirmations;

    /**
     * States if the transaction is a double-spend (`true`) or not (`false`)
     */
    #[Json('double_spend_seen')]
    public bool $doubleSpendSeen;

    /**
     * States if the transaction is in pool (`true`) or included in a block (`false`)
     */
    #[Json('in_pool')]
    public bool $inPool;

    /**
     * @var int[] transaction indexes
     */
    #[Json('output_indices')]
    public array $outputIndices;

    /**
     * Prunable block encoded as a hex string.
     */
    #[Json('prunable_as_hex')]
    public string $prunableAsHex;

    /**
     * Keccak-256 hash of the prunable portion of the block.
     */
    #[Json('prunable_hash')]
    public string $prunableHash;

    /**
     * Pruned block encoded as hex string.
     */
    #[Json('pruned_as_hex')]
    public string $prunedAsHex;

    /**
     * transaction hash
     */
    #[Json('tx_hash')]
    public string $txHash;

    /**
     * @param int[] $outputIndices
     */
    public function __construct(
        string $asHex,
        string $asJson,
        int $blockHeight,
        int $blockTimestamp,
        int $confirmations,
        bool $doubleSpendSeen,
        bool $inPool,
        array $outputIndices,
        string $prunableAsHex,
        string $prunableHash,
        string $prunedAsHex,
        string $txHash,
    ) {
        $this->asHex = $asHex;
        $this->asJson = $asJson;
        $this->blockHeight = $blockHeight;
        $this->blockTimestamp = $blockTimestamp;
        $this->confirmations = $confirmations;
        $this->doubleSpendSeen = $doubleSpendSeen;
        $this->inPool = $inPool;
        $this->outputIndices = $outputIndices;
        $this->prunableAsHex = $prunableAsHex;
        $this->prunableHash = $prunableHash;
        $this->prunedAsHex = $prunedAsHex;
        $this->txHash = $txHash;
    }

    /**
     * @param string[] $jd
     * @param mixed[]|string $path
     */
    public static function fromJsonData($jd, array|string $path = []): static
    {
        $data = self::fromJsonDataOriginal($jd, $path);

        $transaction = TransactionData::fromJsonString($jd['as_json']);
        $data->transaction = $transaction;

        return $data;
    }
}
