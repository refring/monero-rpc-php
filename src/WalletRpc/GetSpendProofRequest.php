<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Generate a signature to prove a spend. Unlike proving a transaction, it does not requires the destination public address.
 */
class GetSpendProofRequest implements ParameterInterface
{
    use JsonSerializeBigInt;

    /**
     * transaction id.
     */
    #[Json]
    public string $txid;

    /**
     * add a message to the signature to further authenticate the prooving process.
     */
    #[Json(omit_empty: true)]
    public ?string $message;

    public static function create(string $txid, ?string $message = null): RpcRequest
    {
        $self = new self();
        $self->txid = $txid;
        $self->message = $message;
        return new RpcRequest('get_spend_proof', $self);
    }
}
