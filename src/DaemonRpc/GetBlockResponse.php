<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Full block information can be retrieved by either block height or hash, like with the above block header calls. For full block information, both lookups use the same method, but with different input parameters.Alias: *getblock*.
 */
class GetBlockResponse
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
    public \RefRing\MoneroRpcPhp\Model\BlockHeader $blockHeader;

    /**
     * If payment for RPC is enabled, the number of credits available to the requesting client. Otherwise, 0.
     */
    #[Json]
    public int $credits;

    /**
     * JSON formatted block details:
     */
    #[Json]
    public string $json;

    #[Json('miner_tx_hash')]
    public string $minerTxHash;

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
