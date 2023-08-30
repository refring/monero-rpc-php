<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Make an integrated address from the wallet address and a payment id.Alias: *None*.
 */
class MakeIntegratedAddressRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * (Optional, defaults to primary address) Destination public address.
     */
    #[Json('standard_address', omit_empty: true)]
    public ?string $standardAddress;

    /**
     * (Optional, defaults to a random ID) 16 characters hex encoded.
     */
    #[Json('payment_id', omit_empty: true)]
    public ?string $paymentId;


    public static function create(?string $standardAddress = null, ?string $paymentId = null): RpcRequest
    {
        $self = new self();
        $self->standardAddress = $standardAddress;
        $self->paymentId = $paymentId;
        return new RpcRequest('make_integrated_address', $self);
    }
}
