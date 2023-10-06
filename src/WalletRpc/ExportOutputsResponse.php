<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Export outputs in hex format.
 */
class ExportOutputsResponse
{
    use JsonSerializeBigInt;

    /**
     * wallet outputs in hex format.
     */
    #[Json('outputs_data_hex')]
    public string $outputsDataHex;
}
