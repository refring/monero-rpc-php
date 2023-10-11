<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Address;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Restores a wallet from a given wallet address, view key, and optional spend key.
 */
class GenerateFromKeysResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * The wallet's address.
     */
    #[Json]
    public Address $address;

    /**
     * Verification message indicating that the wallet was generated successfully and whether or not it is a view-only wallet.
     */
    #[Json]
    public string $info;
}
