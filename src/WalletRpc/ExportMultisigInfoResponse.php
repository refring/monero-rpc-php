<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Export multisig info for other participants.
 */
class ExportMultisigInfoResponse
{
    use JsonSerializeBigInt;

    /**
     * Multisig info in hex format for other participants.
     */
    #[Json]
    public string $info;
}
