<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\SubAddressIndex;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Get account and address indexes from a specific (sub)address
 */
class GetAddressIndexResponse
{
    use JsonSerializeBigInt;

    /**
     * JSON object containing the major & minor subaddress index:
     */
    #[Json]
    public SubAddressIndex $index;
}
