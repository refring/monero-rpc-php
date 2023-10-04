<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonBaseResponse;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Set daemon bandwidth limits.
 */
class SetLimitResponse extends DaemonBaseResponse
{
    use JsonSerialize;

    /**
     * Download limit in kBytes per second
     */
    #[Json('limit_down')]
    public int $limitDown;

    /**
     * Upload limit in kBytes per second
     */
    #[Json('limit_up')]
    public int $limitUp;
}
