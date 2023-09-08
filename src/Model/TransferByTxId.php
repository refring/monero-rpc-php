<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class TransferByTxId
{
    use JsonSerialize;

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
     * @var TransferDestination[]  array of JSON objects containing transfer destinations: (only for outgoing transactions):
     */
    #[Json(type: TransferDestination::class)]
    public array $destinations;

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

    #[Json]
    public bool $locked;

    /**
     * Note about this transfer.
     */
    #[Json]
    public string $note;

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
     * @var SubAddressIndex[] (Optional) Sweep from this set of subaddresses in the account.
     */
    #[Json('subaddr_indices', omit_empty: true, type: SubAddressIndex::class)]
    public ?array $subaddrIndices;

    /**
     * Number of confirmations needed for the amount received to be lower than the accumulated block reward (or close to that).
     */
    #[Json('suggested_confirmations_threshold')]
    public int $suggestedConfirmationsThreshold;

    /**
     * POSIX timestamp for the block that confirmed this transfer (or timestamp submission if not mined yet).
     */
    #[Json]
    public int $timestamp;

    /**
     * Transaction ID of this transfer (same as input TXID).
     */
    #[Json]
    public string $txid;

    /**
     * Type of transfer, one of the following: "in", "out", "pending", "failed", "pool"
     */
    #[Json]
    public string $type;

    /**
     * Number of blocks until transfer is safely spendable.
     */
    #[Json('unlock_time')]
    public int $unlockTime;
}
