<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Relay a list of transaction IDs.
 */
class RelayTxRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * @var string[] list of transaction IDs to relay
     */
    #[Json]
    public array $txids;

    /**
     * @param string[] $txids
     */
    public static function create(array $txids): RpcRequest
    {
        $self = new self();
        $self->txids = $txids;
        return new RpcRequest('relay_tx', $self);
    }
}
