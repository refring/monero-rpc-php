<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Ban another node by IP.
 */
class SetBansResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;
}
