<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\JsonSerialize;

/**
 * Ban another node by IP.
 */
class SetBansResponse extends DaemonBaseResponse
{
    use JsonSerialize;
}
