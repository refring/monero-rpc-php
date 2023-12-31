<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonRpcAccessResponseFields;
use RefRing\MoneroRpcPhp\Model\BlockHash;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get the known blocks hashes which are not on the main chain.
 */
class GetAltBlocksHashesResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

    /**
     * @var BlockHash[] list of alternative blocks hashes to main chain
     */
    #[Json('blks_hashes', type: BlockHash::class)]
    public array $blockHashes = [];
}
