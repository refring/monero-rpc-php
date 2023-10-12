<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use RefRing\MoneroRpcPhp\WalletRpc\Model\TransferDescription;
use RefRing\MoneroRpcPhp\WalletRpc\Model\TxSetSummary;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Returns details for each transaction in an unsigned or multisig transaction set.
 * Transaction sets are obtained as return values from one of the following RPC methods:* transfer* transfer_split* sweep_all* sweep_single* sweep_dust
 * These methods return unsigned transaction sets if the wallet is view-only (i.e. the wallet was created without the private spend key).
 * WARNING Verify that the transfer has a sane `unlock_time` otherwise the funds might be inaccessible.
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
