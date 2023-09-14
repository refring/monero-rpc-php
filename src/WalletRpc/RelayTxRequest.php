<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Relay a transaction previously created with `"do_not_relay":true`.
 */
class RelayTxRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * transaction metadata returned from a `transfer` method with `get_tx_metadata` set to `true`.
     */
    #[Json]
    public string $hex;


    public static function create(string $hex): RpcRequest
    {
        $self = new self();
        $self->hex = $hex;
        return new RpcRequest('relay_tx', $self);
    }
}
