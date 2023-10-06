<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Prove a spend using a signature. Unlike proving a transaction, it does not requires the destination public address.
 */
class CheckSpendProofRequest implements ParameterInterface
{
    use JsonSerializeBigInt;

    /**
     * transaction id.
     */
    #[Json]
    public string $txid;

    /**
     * spend signature to confirm.
     */
    #[Json]
    public string $signature;

    /**
     * Should be the same message used in `get_spend_proof`.
     */
    #[Json(omit_empty: true)]
    public ?string $message;

    public static function create(string $txid, string $signature, ?string $message = null): RpcRequest
    {
        $self = new self();
        $self->txid = $txid;
        $self->signature = $signature;
        $self->message = $message;
        return new RpcRequest('check_spend_proof', $self);
    }
}
