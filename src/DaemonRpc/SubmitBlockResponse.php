<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Submit a mined block to the network.
 */
class SubmitBlockResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * Id of submitted block (v0.18.2.2+)
     */
    #[Json('block_id')]
    public string $blockId;
}
