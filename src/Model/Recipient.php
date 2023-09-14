<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class Recipient
{
    use JsonSerialize;

    /**
     * Amount to send to each destination, in piconero.
     */
    #[Json]
    public int $amount;

    /**
     * The public address of the recipient.
     */
    #[Json]
    public string $address;

    public function __construct(string $address, int $amount)
    {
        $this->address = $address;
        $this->amount = $amount;
    }
}
