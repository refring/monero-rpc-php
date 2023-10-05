<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class PopBlocksResponse
{
    use JsonSerialize;
    use DaemonStandardResponseFields;

    #[Json]
    public int $height;
}
