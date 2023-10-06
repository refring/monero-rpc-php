<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

class AddressBookEntry
{
    use JsonSerializeBigInt;

    /**
     * Public address of the entry
     */
    #[Json]
    public string $address;

    /**
     * Description of this address entry
     */
    #[Json]
    public string $description;

    #[Json]
    public int $index;

    public function __construct(string $address, string $description, int $index)
    {
        $this->address = $address;
        $this->description = $description;
        $this->index = $index;
    }
}
