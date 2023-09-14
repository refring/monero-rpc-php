<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Import signed key images list and verify their spent status.
 */
class ImportKeyImagesResponse
{
    use JsonSerialize;

    #[Json]
    public int $height;

    /**
     * Amount (in piconero) spent from those key images.
     */
    #[Json]
    public int $spent;

    /**
     * Amount (in piconero) still available from those key images.
     */
    #[Json]
    public int $unspent;
}
