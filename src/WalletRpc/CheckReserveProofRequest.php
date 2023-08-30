<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Proves a wallet has a disposable reserve using a signature.Alias: *None*.
 */
class CheckReserveProofRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * Public address of the wallet.
     */
    #[Json]
    public string $address;

    /**
     * If a _message_ was added to `get_reserve_proof` (optional), this message will be required when using `check_reserve_proof`
     */
    #[Json(omit_empty: true)]
    public ?string $message;

    /**
     * reserve signature to confirm.
     */
    #[Json]
    public string $signature;


    public static function create(string $address, ?string $message = null, string $signature): RpcRequest
    {
        $self = new self();
        $self->address = $address;
        $self->message = $message;
        $self->signature = $signature;
        return new RpcRequest('check_reserve_proof', $self);
    }
}
