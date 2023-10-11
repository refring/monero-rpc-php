<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Import multisig info from other participants.
 */
class ImportMultisigInfoResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Number of outputs signed with those multisig info.
     */
    #[Json('n_outputs')]
    public int $nOutputs;
}
