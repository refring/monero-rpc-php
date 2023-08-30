<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Create a new address for an account. Optionally, label the new address.Alias: *None*.
 */
class CreateAddressResponse
{
	use JsonSerialize;

	/**
	 * Newly created address. Base58 representation of the public keys.
	 */
	#[Json]
	public string $address;

	/**
	 * Index of the new address under the input account.
	 */
	#[Json('address_index')]
	public int $addressIndex;

	/**
	 * List of address indices.
	 */
	#[Json('address_indices')]
	public array $addressIndices;

	/**
	 * list of addresses.
     * @var string[]
	 */
	#[Json]
	public array $addresses;
}
