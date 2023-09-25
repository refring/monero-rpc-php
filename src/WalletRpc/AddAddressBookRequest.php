<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Address;
use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Add an entry to the address book.
 */
class AddAddressBookRequest implements ParameterInterface
{
    use JsonSerialize;

    #[Json]
    public Address $address;

    /**
     * (Optional) defaults to "";
     */
    #[Json(omit_empty: true)]
    public ?string $description;

    public static function create(Address $address, ?string $description = null): RpcRequest
    {
        $self = new self();
        $self->address = $address;
        $self->description = $description;
        return new RpcRequest('add_address_book', $self);
    }
}
