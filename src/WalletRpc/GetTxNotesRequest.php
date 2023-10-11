<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get string notes for transactions.
 */
class GetTxNotesRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * @var string[] transaction ids
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
        return new RpcRequest('get_tx_notes', $self);
    }
}
