<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Address;
use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get transaction signature to prove it.
 */
class GetTxProofRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * transaction id.
     */
    #[Json]
    public string $txid;

    /**
     * destination public address of the transaction.
     */
    #[Json]
    public Address $address;

    /**
     * add a message to the signature to further authenticate the prooving process.
     */
    #[Json(omit_empty: true)]
    public ?string $message;

    public static function create(string $txid, Address $address, ?string $message = null): RpcRequest
    {
        $self = new self();
        $self->txid = $txid;
        $self->address = $address;
        $self->message = $message;
        return new RpcRequest('get_tx_proof', $self);
    }
}
