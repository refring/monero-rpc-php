<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Set arbitrary string notes for transactions.
 */
class SetTxNotesRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * @var string[] transaction ids
     */
    #[Json]
    public array $txids;

    /**
     * @var string[] notes for the transactions
     */
    #[Json]
    public array $notes;


    /**
     * @param string[] $txids
     * @param string[] $notes
     */
    public static function create(array $txids, array $notes): RpcRequest
    {
        $self = new self();
        $self->txids = $txids;
        $self->notes = $notes;
        return new RpcRequest('set_tx_notes', $self);
    }
}
