<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonBaseResponse;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class PopBlocksResponse extends DaemonBaseResponse
{
    use JsonSerialize;

    #[Json]
    public int $height;
}
