<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Relay a transaction previously created with `"do_not_relay":true`.
 */
class RelayTxResponse
{
    use JsonSerializeBigInt;

    /**
     * String for the publically searchable transaction hash.
     */
    #[Json('tx_hash')]
    public string $txHash;
}
