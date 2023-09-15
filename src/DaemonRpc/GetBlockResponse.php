<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\BlockHeader;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Full block information can be retrieved by either block height or hash, like with the above block header calls. For full block information, both lookups use the same method, but with different input parameters.Alias: *getblock*.
 */
class GetBlockResponse extends RpcAccessBaseResponse
{
    use JsonSerialize;

    /**
     * Hexadecimal blob of block information.
     */
    #[Json]
    public string $blob;

    /**
     * A structure containing block header information.
     */
    #[Json('block_header')]
    public BlockHeader $blockHeader;

    /**
     * JSON formatted block details:
     */
    #[Json]
    public string $json;

    #[Json('miner_tx_hash')]
    public string $minerTxHash;

    /**
     * @var string[]
     */
    #[Json('tx_hashes')]
    public array $txHashes;
}
