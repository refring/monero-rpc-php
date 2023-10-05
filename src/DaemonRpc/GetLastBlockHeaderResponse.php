<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\BlockHeader;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Block header information for the most recent block is easily retrieved with this method. No inputs are needed.
 */
class GetLastBlockHeaderResponse
{
    use JsonSerialize;
    use DaemonRpcAccessResponseFields;

    /**
     * A structure containing block header information.
     */
    #[Json('block_header')]
    public BlockHeader $blockHeader;
}
