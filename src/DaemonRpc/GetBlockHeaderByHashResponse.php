<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\BlockHeader;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Block header information can be retrieved using either a block's hash or height. This method includes a block's hash as an input parameter to retrieve basic information about the block.
 */
class GetBlockHeaderByHashResponse extends RpcAccessBaseResponse
{
    use JsonSerialize;

    /**
     * A structure containing block header information.
     */
    #[Json('block_header')]
    public BlockHeader $blockHeader;
}
