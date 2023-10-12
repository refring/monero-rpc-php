<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\DaemonRpc\Model\AuxPow;
use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Easily enable merge mining with Monero without requiring software that manually alters the extra field in the coinbase tx to include the merkle root of the aux blocks.
 */
class AddAuxPowRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json('blocktemplate_blob')]
    public string $blocktemplateBlob;

    /** @var AuxPow[] */
    #[Json('aux_pow')]
    public array $auxPow;

    /**
     * @param AuxPow[] $auxPow
     */
    public static function create(string $blocktemplateBlob, array $auxPow): RpcRequest
    {
        $self = new self();
        $self->blocktemplateBlob = $blocktemplateBlob;
        $self->auxPow = $auxPow;
        return new RpcRequest('add_aux_pow', $self);
    }
}
