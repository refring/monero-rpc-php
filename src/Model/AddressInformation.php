<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class AddressInformation
{
    use JsonSerialize;

    /**
     * The 95-character hex (sub)address string.
     */
    #[Json]
    public string $address;

    /**
     * index of the subaddress
     */
    #[Json('address_index')]
    public int $addressIndex;

    /**
     * Label of the (sub)address
     */
    #[Json]
    public string $label;

    /**
     * states if the (sub)address has already received funds
     */
    #[Json]
    public bool $used;


    public function __construct(string $address, string $label, int $addressIndex, bool $used)
    {
        $this->address = $address;
        $this->label = $label;
        $this->addressIndex = $addressIndex;
        $this->used = $used;
    }
}
