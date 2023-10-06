<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Import multisig info from other participants.
 */
class ImportMultisigInfoResponse
{
    use JsonSerializeBigInt;

    /**
     * Number of outputs signed with those multisig info.
     */
    #[Json('n_outputs')]
    public int $nOutputs;
}
