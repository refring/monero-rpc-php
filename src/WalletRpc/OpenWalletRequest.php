<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Open a wallet. You need to have set the argument "--wallet-dir" when launching monero-wallet-rpc to make this work.
 */
class OpenWalletRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * wallet name stored in --wallet-dir.
     */
    #[Json]
    public string $filename;

    /**
     * (Optional) only needed if the wallet has a password defined.
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
