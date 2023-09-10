<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use RefRing\MoneroRpcPhp\Trait\CollectionTrait;

/**
 * Submit a mined block to the network.
 * @implements \IteratorAggregate<string>
 */
class SubmitBlockRequest implements ParameterInterface, \IteratorAggregate
{
    use CollectionTrait;

    /**
     * @param string[] $values
     */
    public static function create(array $values): RpcRequest
    {
        $self = new self();
        $self->values = $values;
        return new RpcRequest('submit_block', $self);
    }
}
