<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Similar to [get_block_header_by_hash](#get_block_header_by_hash) above, this method includes a block's height as an input parameter to retrieve basic information about the block.Alias: *getblockheaderbyheight*.
 */
class GetBlockHeaderByHeightResponse
{
    use JsonSerialize;

    /**
     * A structure containing block header information.
     */
    #[Json('block_header')]
    public \RefRing\MoneroRpcPhp\Model\BlockHeader $blockHeader;


    /**
     * If payment for RPC is enabled, the number of credits available to the requesting client. Otherwise, 0.
     */
    #[Json]
    public int $credits;

    /**
     * General RPC error code. "OK" means everything looks good.
     */
    #[Json]
    public string $status;

    /**
     * If payment for RPC is enabled, the hash of the highest block in the chain. Otherwise, empty.
     */
    #[Json('top_hash')]
    public string $topHash;

    /**
     * States if the result is obtained using the bootstrap mode, and is therefore not trusted (`true`), or when the daemon is fully synced and thus handles the RPC locally (`false`)
     */
    #[Json]
    public bool $untrusted;
}
