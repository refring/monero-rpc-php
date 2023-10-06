<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Address;
use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Prove a transaction by checking its signature.
 */
class CheckTxProofRequest implements ParameterInterface
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
     * transaction signature to confirm.
     */
    #[Json]
    public string $signature;

    /**
     * Should be the same message used in `get_tx_proof`.
     */
    #[Json(omit_empty: true)]
    public ?string $message;

    public static function create(
        string $txid,
        Address $address,
        string $signature,
        ?string $message = null,
    ): RpcRequest {
        $self = new self();
        $self->txid = $txid;
        $self->address = $address;
        $self->signature = $signature;
        $self->message = $message;
        return new RpcRequest('check_tx_proof', $self);
    }
}
