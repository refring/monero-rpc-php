<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Prove a spend using a signature. Unlike proving a transaction, it does not requires the destination public address.
 */
class CheckSpendProofResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * States if the inputs proves the spend.
     */
    #[Json]
    public bool $good;
}
