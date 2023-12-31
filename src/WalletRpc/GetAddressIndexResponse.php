<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use RefRing\MoneroRpcPhp\WalletRpc\Model\SubAddressIndex;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Get account and address indexes from a specific (sub)address
 */
class GetAddressIndexResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * JSON object containing the major & minor subaddress index:
     */
    #[Json]
    public SubAddressIndex $index;
}
