<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

class EstimateTxSizeAndWeightResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json]
    public int $size;

    #[Json]
    public int $weight;
}
