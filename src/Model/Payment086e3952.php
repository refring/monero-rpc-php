<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class Payment
{
    use JsonSerialize;

    /**
     * Payment ID matching one of the input IDs.
     */
    #[Json('payment_id')]
    public string $paymentId;

    /**
     * Transaction hash used as the transaction ID.
     */
    #[Json('tx_hash')]
    public string $txHash;

    /**
     * Amount for this payment.
     */
    #[Json]
    public int $amount;

    /**
     * Height of the block that first confirmed this payment.
     */
    #[Json('block_height')]
    public int $blockHeight;

    /**
     * Time (in block height) until this payment is safe to spend.
     */
    #[Json('unlock_time')]
    public int $unlockTime;

    /**
     * JSON object containing the major & minor subaddress index:
     */
    #[Json('subaddr_index')]
    public SubAddressIndex $subaddrIndex;
}
