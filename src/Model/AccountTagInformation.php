<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class AccountTagInformation
{
    use JsonSerialize;
    /**
     * @var int[] List of tagged account indices.
     */
    #[Json]
    public array $accounts;

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
