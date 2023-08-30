<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class AccountTagInformation
{
    use JsonSerialize;

    /**
     * Filter tag.
     */
    #[Json]
    public string $tag;

    /**
     * Label for the tag.
     */
    #[Json]
    public string $label;

    /**
     * List of tagged account indices.
     */
    #[Json]
    public array $accounts;


    public function __construct(string $tag, string $label, array $accounts)
    {
        $this->tag = $tag;
        $this->label = $label;
        $this->accounts = $accounts;
    }
}
