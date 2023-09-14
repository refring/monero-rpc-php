<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Address;
use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get account and address indexes from a specific (sub)address
 */
class GetAddressIndexRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * (sub)address to look for.
     */
    #[Json]
    public Address $address;


    public static function create(Address $address): RpcRequest
    {
        $self = new self();
        $self->address = $address;
        return new RpcRequest('get_address_index', $self);
    }
}
