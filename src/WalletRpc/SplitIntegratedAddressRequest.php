<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Retrieve the standard address and payment id corresponding to an integrated address.
 */
class SplitIntegratedAddressRequest implements ParameterInterface
{
    use JsonSerializeBigInt;

    /**
     * string
     */
    #[Json('integrated_address')]
    public string $integratedAddress;

    public static function create(string $integratedAddress): RpcRequest
    {
        $self = new self();
        $self->integratedAddress = $integratedAddress;
        return new RpcRequest('split_integrated_address', $self);
    }
}
