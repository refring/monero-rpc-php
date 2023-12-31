<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get transaction secret key from transaction id.
 */
class GetTxKeyRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * transaction id.
     */
    #[Json]
    public string $txid;

    public static function create(string $txid): RpcRequest
    {
        $self = new self();
        $self->txid = $txid;
        return new RpcRequest('get_tx_key', $self);
    }
}
