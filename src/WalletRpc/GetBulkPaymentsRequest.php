<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Get a list of incoming payments using a given payment id, or a list of payments ids, from a given height. This method is the preferred method over `get_payments` because it has the same functionality but is more extendable. Either is fine for looking up transactions by a single payment ID.<p style="color:red;"><b>WARNING</b> Verify that the payment has a sane <code>unlock_time</code> otherwise the funds might be inaccessible.</p>
 */
class GetBulkPaymentsRequest implements ParameterInterface
{
    use JsonSerializeBigInt;

    /**
     * @var string[] Payment IDs used to find the payments (16 characters hex).
     */
    #[Json('payment_ids')]
    public array $paymentIds;

    /**
     * The block height at which to start looking for payments.
     */
    #[Json('min_block_height')]
    public int $minBlockHeight;


    /**
     * @param string[] $paymentIds
     */
    public static function create(array $paymentIds, int $minBlockHeight): RpcRequest
    {
        $self = new self();
        $self->paymentIds = $paymentIds;
        $self->minBlockHeight = $minBlockHeight;
        return new RpcRequest('get_bulk_payments', $self);
    }
}
