<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonBaseResponse;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Easily enable merge mining with Monero without requiring software that manually alters the extra field in the coinbase tx to include the merkle root of the aux blocks.
 */
class PopBlocksResponse extends DaemonBaseResponse
{
    use JsonSerialize;

    #[Json]
    public int $height;
}
