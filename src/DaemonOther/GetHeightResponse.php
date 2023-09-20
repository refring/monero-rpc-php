<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonBaseResponse;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class GetHeightResponse extends DaemonBaseResponse
{
    use JsonSerialize;

    /**
     * The block's hash.
     */
    #[Json]
    public string $hash;

    /**
     * Current length of longest chain known to daemon.
     */
    #[Json]
    public int $height;
}
