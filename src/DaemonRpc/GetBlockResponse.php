<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\DaemonRpc\Model\BlockHeader;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Full block information can be retrieved by either block height or hash, like with the above block header calls. For full block information, both lookups use the same method, but with different input parameters.
 */
class GetBlockResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

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

    /**
     * The hash of this block's coinbase transaction.
     */
    #[Json('miner_tx_hash')]
    public string $minerTxHash;

    /**
     * @var string[] List of hashes of non-coinbase transactions in the block. If there are no other transactions, this will be an empty list.
     */
    #[Json('tx_hashes', omit_empty: true)]
    public array $txHashes = [];
}
