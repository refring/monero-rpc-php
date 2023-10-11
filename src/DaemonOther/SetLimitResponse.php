<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Set daemon bandwidth limits.
 */
class SetLimitResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

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
