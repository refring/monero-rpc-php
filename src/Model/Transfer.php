<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class Transfer
{
    use JsonSerialize;

    /**
     * Amount of this transfer.
     */
    #[Json]
    public int $amount;

    /**
     * Mostly internal use, can be ignored by most users.
     */
    #[Json('global_index')]
    public int $globalIndex;

    /**
     * Key image for the incoming transfer's unspent output.
     */
    #[Json('key_image')]
    public string $keyImage;

    /**
     * Indicates if this transfer has been spent.
     */
    #[Json]
    public bool $spent;

    /**
     * JSON object containing the major & minor subaddress index:
     */
    #[Json('subaddr_index')]
    public SubAddressIndex $subaddrIndex;


    public function __construct(
        int $amount,
        int $globalIndex,
        string $keyImage,
        bool $spent,
        SubAddressIndex $subaddrIndex,
    ) {
        $this->amount = $amount;
        $this->globalIndex = $globalIndex;
        $this->keyImage = $keyImage;
        $this->spent = $spent;
        $this->subaddrIndex = $subaddrIndex;
    }
}
