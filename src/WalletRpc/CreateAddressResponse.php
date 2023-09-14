<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Address;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Create a new address for an account. Optionally, label the new address.
 */
class CreateAddressResponse
{
    use JsonSerialize;

    /**
     * Newly created address. Base58 representation of the public keys.
     */
    #[Json]
    public Address $address;

    /**
     * Index of the new address under the input account.
     */
    #[Json('address_index')]
    public int $addressIndex;

    /**
     * @var int[] List of address indices.
     */
    #[Json('address_indices')]
    public array $addressIndices;

    /**
     * list of addresses.
     * @var Address[]
     */
    #[Json(type: Address::class)]
    public array $addresses;
}
