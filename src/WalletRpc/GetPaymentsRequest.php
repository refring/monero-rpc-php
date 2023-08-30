<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get a list of incoming payments using a given payment id.<p style="color:red;"><b>WARNING</b> Verify that the payment has a sane <code>unlock_time</code> otherwise the funds might be inaccessible</p>Alias: *None*.
 */
class GetPaymentsRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * Payment ID used to find the payments (16 characters hex).
     */
    #[Json('payment_id')]
    public string $paymentId;


    public static function create(string $paymentId): RpcRequest
    {
        $self = new self();
        $self->paymentId = $paymentId;
        return new RpcRequest('get_payments', $self);
    }
}
