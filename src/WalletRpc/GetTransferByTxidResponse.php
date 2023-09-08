<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Transfer;
use RefRing\MoneroRpcPhp\Model\TransferByTxId;
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
    public TransferByTxId $transfer;

    /** @var TransferByTxId[] If the array length is > 1 then multiple outputs where received in this transaction, each of which has its own `transfer` JSON object. */
    #[Json(type: TransferByTxId::class)]
    public ?array $transfers;
}
