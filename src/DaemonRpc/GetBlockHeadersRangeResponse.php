<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\BlockHeader;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Similar to [get_block_header_by_height](#get_block_header_by_height) above, but for a range of blocks. This method includes a starting block height and an ending block height as parameters to retrieve basic information about the range of blocks.
 */
class GetBlockHeadersRangeResponse
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

    /** @var BlockHeader[] (a structure containing block header information. See [get_last_block_header](#get_last_block_header)). */
    #[Json(type: BlockHeader::class)]
    public array $headers = [];
}
