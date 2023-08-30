<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Import outputs in hex format.Alias: *None*.
 */
class ImportOutputsResponse
{
    use JsonSerialize;

    /**
     * number of outputs imported.
     */
    #[Json('num_imported')]
    public int $numImported;
}
