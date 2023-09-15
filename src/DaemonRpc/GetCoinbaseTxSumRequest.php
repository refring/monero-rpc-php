<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get the coinbase amount and the fees amount for n last blocks starting at particular height
 */
class GetCoinbaseTxSumRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * Block height from which getting the amounts
     */
    #[Json]
    public int $height;

    /**
     * number of blocks to include in the sum
     */
    #[Json]
    public int $count;


    public static function create(int $height, int $count): RpcRequest
    {
        $self = new self();
        $self->height = $height;
        $self->count = $count;
        return new RpcRequest('get_coinbase_tx_sum', $self);
    }
}
