<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use RefRing\MoneroRpcPhp\Monero\Amount;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class MemPoolTransaction implements JsonDataSerializable
{
    use JsonSerializeBigInt{
        fromJsonData as fromJsonDataOriginal;
    }

    /**
     * The size of the full transaction blob.
     */
    #[Json('blob_size')]
    public int $blobSize;

    #[Json('do_not_relay')]
    public bool $doNotRelay;

    /**
     * States if this transaction has been seen as double spend.
     */
    #[Json('double_spend_seen')]
    public bool $doubleSpendSeen;

    /**
     * The amount of the mining fee included in the transaction, in piconero.
     */
    #[Json]
    public Amount $fee;

    /**
     * The transaction ID hash.
     */
    #[Json('id_hash')]
    public string $idHash;

    /**
     * States if the tx was included in a block at least once (`true`) or not (`false`).
     */
    #[Json('kept_by_block')]
    public bool $keptByBlock;

    /**
     * If the transaction validation has previously failed, this tells at what height that occured.
     */
    #[Json('last_failed_height')]
    public int $lastFailedHeight;

    /**
     * Like the previous, this tells the previous transaction ID hash.
     */
    #[Json('last_failed_id_hash')]
    public string $lastFailedIdHash;

    /**
     * Last unix time at which the transaction has been relayed.
     */
    #[Json('last_relayed_time')]
    public int $lastRelayedTime;

    /**
     * Tells the height of the most recent block with an output used in this transaction.
     */
    #[Json('max_used_block_height')]
    public int $maxUsedBlockHeight;

    /**
     * Tells the hash of the most recent block with an output used in this transaction.
     */
    #[Json('max_used_block_id_hash')]
    public string $maxUsedBlockIdHash;

    /**
     * The Unix time that the transaction was first seen on the network by the node.
     */
    #[Json('receive_time')]
    public int $receiveTime;

    /**
     * States if this transaction has been relayed
     */
    #[Json]
    public bool $relayed;

    /**
     * Hexadecimal blob represnting the transaction.
     */
    #[Json('tx_blob')]
    public string $txBlob;

    /**
     * JSON structure of all information in the transaction:
     */
    #[Json('tx_json')]
    public string $txJson;

    /**
     * Structure of all information in the transaction
     */
    public ?TransactionData $transaction = null;

    #[Json]
    public int $weight;

    public function __construct(
        int $blobSize,
        bool $doubleSpendSeen,
        Amount $fee,
        string $idHash,
        bool $keptByBlock,
        int $lastFailedHeight,
        string $lastFailedIdHash,
        int $lastRelayedTime,
        int $maxUsedBlockHeight,
        string $maxUsedBlockIdHash,
        int $receiveTime,
        bool $relayed,
        string $txBlob,
        string $txJson,
        int $weight,
    ) {
        $this->blobSize = $blobSize;
        $this->doubleSpendSeen = $doubleSpendSeen;
        $this->fee = $fee;
        $this->idHash = $idHash;
        $this->keptByBlock = $keptByBlock;
        $this->lastFailedHeight = $lastFailedHeight;
        $this->lastFailedIdHash = $lastFailedIdHash;
        $this->lastRelayedTime = $lastRelayedTime;
        $this->maxUsedBlockHeight = $maxUsedBlockHeight;
        $this->maxUsedBlockIdHash = $maxUsedBlockIdHash;
        $this->receiveTime = $receiveTime;
        $this->relayed = $relayed;
        $this->txBlob = $txBlob;
        $this->txJson = $txJson;
        $this->weight = $weight;
    }

    /**
     * @param string[] $jd
     * @param mixed[]|string $path
     */
    public static function fromJsonData($jd, array|string $path = []): static
    {
        $data = self::fromJsonDataOriginal($jd, $path);

        $transaction = TransactionData::fromJsonString($jd['tx_json']);
        $data->transaction = $transaction;

        return $data;
    }
}
