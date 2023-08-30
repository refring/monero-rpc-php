<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Import outputs in hex format.Alias: *None*.
 */
class ImportOutputsRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * wallet outputs in hex format.
     */
    #[Json('outputs_data_hex')]
    public string $outputsDataHex;


    public static function create(string $outputsDataHex): RpcRequest
    {
        $self = new self();
        $self->outputsDataHex = $outputsDataHex;
        return new RpcRequest('import_outputs', $self);
    }
}
