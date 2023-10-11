<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Check if a wallet is a multisig one.
 */
class IsMultisigResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * States if the wallet is multisig
     */
    #[Json]
    public bool $multisig;

    #[Json]
    public bool $ready;

    /**
     * Amount of signature needed to sign a transfer.
     */
    #[Json]
    public int $threshold;

    /**
     * Total amount of signature in the multisig wallet.
     */
    #[Json]
    public int $total;
}
