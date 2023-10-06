<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Import outputs in hex format.
 */
class ImportOutputsResponse
{
    use JsonSerializeBigInt;

    /**
     * number of outputs imported.
     */
    #[Json('num_imported')]
    public int $numImported;
}
