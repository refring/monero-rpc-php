<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc\Model;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class HardforkInformation implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json]
    public int $height;

    #[Json('hf_version')]
    public int $version;
}
