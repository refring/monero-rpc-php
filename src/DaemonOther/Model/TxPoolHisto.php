<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther\Model;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class TxPoolHisto implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * number of transactions
     */
    #[Json]
    public int $txs;

    /**
     * size in bytes.
     */
    #[Json]
    public int $bytes;

    public function __construct(int $txs, int $bytes)
    {
        $this->txs = $txs;
        $this->bytes = $bytes;
    }
}
