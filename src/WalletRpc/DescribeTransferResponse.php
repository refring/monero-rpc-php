<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\TransferDescription;
use RefRing\MoneroRpcPhp\Model\TxSetSummary;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Returns details for each transaction in an unsigned or multisig transaction set. Transaction sets are obtained as return values from one of the following RPC methods:* transfer* transfer_split* sweep_all* sweep_single* sweep_dustThese methods return unsigned transaction sets if the wallet is view-only (i.e. the wallet was created without the private spend key).<p style="color:red;"><b>WARNING</b> Verify that the transfer has a sane <code>unlock_time</code> otherwise the funds might be inaccessible.</p>
 */
class DescribeTransferResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /** @var TransferDescription[] */
    #[Json(type: TransferDescription::class)]
    public array $desc = [];

    #[Json]
    public TxSetSummary $summary;
}
