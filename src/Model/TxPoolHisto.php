<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;
use Square\Pjson\JsonSerialize;

class TxPoolHisto implements JsonDataSerializable
{
    use JsonSerialize;

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
