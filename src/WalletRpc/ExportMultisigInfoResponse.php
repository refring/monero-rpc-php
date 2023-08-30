<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Export multisig info for other participants.Alias: *None*.
 */
class ExportMultisigInfoResponse
{
    use JsonSerialize;

    /**
     * Multisig info in hex format for other participants.
     */
    #[Json]
    public string $info;
}
