<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Generate a block and specify the address to receive the coinbase reward.
 */
class GenerateblocksResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * @var OnGetBlockHashResponse[]
     */
    #[Json]
    public array $blocks = [];

    #[Json]
    public int $height;
}
