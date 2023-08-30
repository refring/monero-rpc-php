<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Import signed key images list and verify their spent status.Alias: *None*.
 */
class ImportKeyImagesResponse
{
    use JsonSerialize;

    #[Json]
    public int $height;

    /**
     * Amount (in @atomic-units) spent from those key images.
     */
    #[Json]
    public int $spent;

    /**
     * Amount (in @atomic-units) still available from those key images.
     */
    #[Json]
    public int $unspent;
}
