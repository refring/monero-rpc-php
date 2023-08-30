<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\SubAddressIndex;
use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Label an address.Alias: *None*.
 */
class LabelAddressRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * JSON Object containing the major & minor address index:
     */
    #[Json]
    public SubAddressIndex $index;

    /**
     * Label for the address.
     */
    #[Json]
    public string $label;


    public static function create(SubAddressIndex $index, string $label): RpcRequest
    {
        $self = new self();
        $self->index = $index;
        $self->label = $label;
        return new RpcRequest('label_address', $self);
    }
}
