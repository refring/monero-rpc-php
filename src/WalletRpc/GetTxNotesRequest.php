<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get string notes for transactions.Alias: *None*.
 */
class GetTxNotesRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * @var string[] transaction ids
     */
    #[Json]
    public array $txids;


    /**
     * @param string[] $txids
     */
    public static function create(array $txids): RpcRequest
    {
        $self = new self();
        $self->txids = $txids;
        return new RpcRequest('get_tx_notes', $self);
    }
}
