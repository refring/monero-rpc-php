<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonRpcAccessResponseFields;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get the known blocks hashes which are not on the main chain.
 */
class GetAltBlocksHashesResponse
{
    use JsonSerialize;
    use DaemonRpcAccessResponseFields;

    /**
     * @var string[] list of alternative blocks hashes to main chain
     */
    #[Json('blks_hashes')]
    public array $blockHashes;
}
