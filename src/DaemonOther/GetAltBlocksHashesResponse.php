<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonRpcAccessResponseFields;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Get the known blocks hashes which are not on the main chain.
 */
class GetAltBlocksHashesResponse
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

    /**
     * @var string[] list of alternative blocks hashes to main chain
     */
    #[Json('blks_hashes')]
    public array $blockHashes = [];
}
