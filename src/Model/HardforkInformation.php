<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

class HardforkInformation
{
    use JsonSerializeBigInt;

    #[Json]
    public int $height;

    #[Json('hf_version')]
    public int $version;
}
