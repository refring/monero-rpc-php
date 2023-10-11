<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Export outputs in hex format.
 */
class ExportOutputsResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * wallet outputs in hex format.
     */
    #[Json('outputs_data_hex')]
    public string $outputsDataHex;
}
