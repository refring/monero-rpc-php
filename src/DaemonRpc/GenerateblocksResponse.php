<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\BlockHash;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Generate a block and specify the address to receive the coinbase reward.
 */
class GenerateblocksResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * @var BlockHash[]
     */
    #[Json(type: BlockHash::class)]
    public array $blocks = [];

    #[Json]
    public int $height;
}
