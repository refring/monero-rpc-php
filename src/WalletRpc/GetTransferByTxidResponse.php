<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Show information about a transfer to/from this address.<p style="color:red;"><b>WARNING</b> Verify that the transfer has a sane <code>unlock_time</code> otherwise the funds might be inaccessible.</p>Alias: *None*.
 */
class GetTransferByTxidResponse
{
    use JsonSerialize;

    /**
     * JSON object containing payment information:
     */
    #[Json]
    public \RefRing\MoneroRpcPhp\Model\Transfer $transfer;

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
     * Height of the first block that confirmed this transfer.
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
    public \RefRing\MoneroRpcPhp\Model\SubAddressIndex $subaddrIndex;

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

    /** @var Transfer[] If the array length is > 1 then multiple outputs where received in this transaction, each of which has its own `transfer` JSON object. */
    #[Json]
    public array $transfers;
}
