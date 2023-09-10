<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Transfer;
use RefRing\MoneroRpcPhp\Model\TransferDestination;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Returns a list of transfers.<p style="color:red;"><b>WARNING</b> Verify that the transfer has a sane <code>unlock_time</code> otherwise the funds might be inaccessible.</p>Alias: *None*.
 */
class GetTransfersResponse
{
    use JsonSerialize;

    /** @var TransferDestination[] */
    #[Json]
    public array $in;

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
     * list of indices if multiple where requested.
     */
    #[Json('subaddr_indices')]
    public \RefRing\MoneroRpcPhp\Model\SubAddressIndex $subaddrIndices;

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
    public string $type;

    /**
     * Number of blocks until transfer is safely spendable.
     */
    #[Json('unlock_time')]
    public int $unlockTime;

    /**
     * Is the output spendable.
     */
    #[Json]
    public bool $locked;

    /** @var Transfer[] (see above). */
    #[Json]
    public array $out;

    /** @var Transfer[] (see above). */
    #[Json]
    public array $pending;

    /** @var Transfer[] (see above). */
    #[Json]
    public array $failed;

    /** @var Transfer[] (see above). */
    #[Json]
    public array $pool;
}
