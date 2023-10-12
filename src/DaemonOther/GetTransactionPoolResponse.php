<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonOther\Model\MemPoolTransaction;
use RefRing\MoneroRpcPhp\DaemonOther\Model\SpentOutputKeyImages;
use RefRing\MoneroRpcPhp\DaemonRpc\DaemonRpcAccessResponseFields;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Show information about valid transactions seen by the node but not yet mined into a block, as well as spent key image information for the txpool in the node's memory.
 */
class GetTransactionPoolResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

    /** @var SpentOutputKeyImages[] */
    #[Json('spent_key_images', type: SpentOutputKeyImages::class)]
    public array $spentKeyImages;

    /** @var MemPoolTransaction[] */
    #[Json(type: MemPoolTransaction::class)]
    public array $transactions;
}
