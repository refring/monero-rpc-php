<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Address;
use RefRing\MoneroRpcPhp\Model\AddressInformation;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Return the wallet's addresses for an account. Optionally filter for specific set of subaddresses.
 */
class GetAddressResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * The 95-character hex address string of the monero-wallet-rpc in session.
     */
    #[Json]
    public Address $address;

    /** @var AddressInformation[] */
    #[Json(type: AddressInformation::class)]
    public array $addresses = [];
}
