<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Export a signed set of key images.
 */
class ExportKeyImagesRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * (optional) If true, export all key images. Otherwise, export key images since the last export. (Defaults to false)
     */
    #[Json(omit_empty: true)]
    public ?bool $all;


    public static function create(?bool $all = null): RpcRequest
    {
        $self = new self();
        $self->all = $all;
        return new RpcRequest('export_key_images', $self);
    }
}
