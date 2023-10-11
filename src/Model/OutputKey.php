<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class OutputKey implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * block height of the output
     */
    #[Json]
    public int $height;

    /**
     * the public key of the output
     */
    #[Json]
    public string $key;

    /**
     * String
     */
    #[Json]
    public string $mask;

    /**
     * transaction id
     */
    #[Json]
    public string $txid;

    /**
     * States if output is locked (`false`) or not (`true`)
     */
    #[Json]
    public bool $unlocked;

    public function __construct(int $height, string $key, string $mask, string $txid, bool $unlocked)
    {
        $this->height = $height;
        $this->key = $key;
        $this->mask = $mask;
        $this->txid = $txid;
        $this->unlocked = $unlocked;
    }
}
