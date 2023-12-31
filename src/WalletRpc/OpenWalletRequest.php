<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Open a wallet. You need to have set the argument "--wallet-dir" when launching monero-wallet-rpc to make this work.
 */
class OpenWalletRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * wallet name stored in --wallet-dir.
     */
    #[Json]
    public string $filename;

    /**
     * only needed if the wallet has a password defined.
     */
    #[Json(omit_empty: true)]
    public ?string $password;

    public static function create(string $filename, ?string $password = null): RpcRequest
    {
        $self = new self();
        $self->filename = $filename;
        $self->password = $password;
        return new RpcRequest('open_wallet', $self);
    }
}
