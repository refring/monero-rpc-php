<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

class PopBlocksResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    #[Json]
    public int $height;
}
