<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Export outputs in hex format.
 */
class ExportOutputsRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * If true, export all outputs. Otherwise, export outputs since the last export. (
     * When omitted the default value is false
     */
    #[Json(omit_empty: true)]
    public ?bool $all;

    public static function create(?bool $all = null): RpcRequest
    {
        $self = new self();
        $self->all = $all;
        return new RpcRequest('export_outputs', $self);
    }
}
