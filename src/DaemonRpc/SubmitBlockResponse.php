<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Submit a mined block to the network.
 */
class SubmitBlockResponse extends DaemonBaseResponse
{
    use JsonSerialize;

    /**
     * Id of submitted block (v0.18.2.2+)
     */
    #[Json('block_id')]
    public string $blockId;
}
