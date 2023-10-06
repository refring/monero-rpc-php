<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

class Transfer
{
    use JsonSerializeBigInt;

    /**
     * Public address of the transfer.
     */
    #[Json]
    public string $address;

    /**
     * Amount transferred.
     */
    #[Json]
    public int $amount;

    /**
     * @var int[] If multiple amounts where recived they are individually listed.
     */
    #[Json]
    public array $amounts;

    /**
     * Number of block mined since the block containing this transaction (or block height at which the transaction should be added to a block if not yet confirmed).
     */
    #[Json]
    public int $confirmations;

    /**
     * True if the key image(s) for the transfer have been seen before.
     */
    #[Json('double_spend_seen')]
    public bool $doubleSpendSeen;

    /**
     * Transaction fee for this transfer.
     */
    #[Json]
    public int $fee;

    /**
     * Height of the first block that confirmed this transfer (0 if not mined yet).
     */
    #[Json]
    public int $height;

    /**
     * Is the output spendable.
     */
    #[Json]
    public bool $locked;

    /**
     * Note about this transfer.
     */
    #[Json]
    public string $note;

    /**
     * @var Destination[]  array of JSON objects containing transfer destinations: (only for outgoing transactions):
     */
    #[Json(type: Destination::class)]
    public array $destinations;

    /**
     * Payment ID for this transfer.
     */
    #[Json('payment_id')]
    public string $paymentId;

    /**
     * JSON object containing the major & minor subaddress index:
     */
    #[Json('subaddr_index')]
    public SubAddressIndex $subaddrIndex;

    /**
     * @var SubAddressIndex[] list of indices if multiple where requested.
     */
    #[Json('subaddr_indices', type: SubAddressIndex::class)]
    public array $subaddrIndices;

    /**
     * Number of confirmations needed for the amount received to be lower than the accumulated block reward (or close to that).
     */
    #[Json('suggested_confirmations_threshold')]
    public int $suggestedConfirmationsThreshold;

    /**
     * POSIX timestamp for when this transfer was first confirmed in a block (or timestamp submission if not mined yet).
     */
    #[Json]
    public int $timestamp;

    /**
     * Transaction ID for this transfer.
     */
    #[Json]
    public string $txid;

    /**
     * Transfer type: "in"
     */
    #[Json]
    public TransferType $type;

    /**
     * Number of blocks until transfer is safely spendable.
     */
    #[Json('unlock_time')]
    public int $unlockTime;

    /**
     * @param string $address
     * @param int $amount
     * @param int[] $amounts
     * @param int $confirmations
     * @param bool $doubleSpendSeen
     * @param int $fee
     * @param int $height
     * @param string $note
     * @param Destination[] $destinations
     * @param string $paymentId
     * @param SubAddressIndex $subaddrIndex
     * @param SubAddressIndex[] $subaddrIndices
     * @param int $suggestedConfirmationsThreshold
     * @param int $timestamp
     * @param string $txid
     * @param int $unlockTime
     * @param bool $locked
     * @param TransferType $type
     */
    public function __construct(string $address, int $amount, array $amounts, int $confirmations, bool $doubleSpendSeen, int $fee, int $height, string $note, array $destinations, string $paymentId, SubAddressIndex $subaddrIndex, array $subaddrIndices, int $suggestedConfirmationsThreshold, int $timestamp, string $txid, int $unlockTime, bool $locked, TransferType $type)
    {
        $this->address = $address;
        $this->amount = $amount;
        $this->amounts = $amounts;
        $this->confirmations = $confirmations;
        $this->doubleSpendSeen = $doubleSpendSeen;
        $this->fee = $fee;
        $this->height = $height;
        $this->note = $note;
        $this->destinations = $destinations;
        $this->paymentId = $paymentId;
        $this->subaddrIndex = $subaddrIndex;
        $this->subaddrIndices = $subaddrIndices;
        $this->suggestedConfirmationsThreshold = $suggestedConfirmationsThreshold;
        $this->timestamp = $timestamp;
        $this->txid = $txid;
        $this->unlockTime = $unlockTime;
        $this->locked = $locked;
        $this->type = $type;
    }


}
