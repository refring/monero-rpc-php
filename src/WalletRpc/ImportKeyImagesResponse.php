<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Amount;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Import signed key images list and verify their spent status.
 */
class ImportKeyImagesResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json]
    public int $height;

    /**
     * Amount (in piconero) spent from those key images.
     */
    #[Json]
    public Amount $spent;

    /**
     * Amount (in piconero) still available from those key images.
     */
    #[Json]
    public Amount $unspent;
}
