<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use RefRing\MoneroRpcPhp\WalletRpc\Model\Transfer;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Show information about a transfer to/from this address.<p style="color:red;"><b>WARNING</b> Verify that the transfer has a sane <code>unlock_time</code> otherwise the funds might be inaccessible.</p>
 */
class GetTransferByTxidResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * JSON object containing payment information:
     */
    #[Json]
    public Transfer $transfer;

    /** @var Transfer[] If the array length is > 1 then multiple outputs where received in this transaction, each of which has its own `transfer` JSON object. */
    #[Json(type: Transfer::class)]
    public ?array $transfers;
}
