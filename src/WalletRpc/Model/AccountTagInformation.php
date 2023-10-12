<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc\Model;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class AccountTagInformation implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    /**
     * @var int[] List of tagged account indices.
     */
    #[Json]
    public array $accounts = [];

    /**
     * Label for the tag.
     */
    #[Json]
    public string $label;

    /**
     * Filter tag.
     */
    #[Json]
    public string $tag;

    /**
     * @param int[] $accounts
     */
    public function __construct(string $tag, string $label, array $accounts)
    {
        $this->tag = $tag;
        $this->label = $label;
        $this->accounts = $accounts;
    }
}
