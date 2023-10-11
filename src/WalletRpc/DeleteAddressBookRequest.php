<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Delete an entry from the address book.
 */
class DeleteAddressBookRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * The index of the address book entry.
     */
    #[Json]
    public int $index;

    public static function create(int $index): RpcRequest
    {
        $self = new self();
        $self->index = $index;
        return new RpcRequest('delete_address_book', $self);
    }
}
