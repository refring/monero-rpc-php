<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Create a new wallet. You need to have set the argument "--wallet-dir" when launching monero-wallet-rpc to make this work.
 */
class CreateWalletRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * Wallet file name.
     */
    #[Json]
    public string $filename;

    /**
     * password to protect the wallet.
     */
    #[Json(omit_empty: true)]
    public ?string $password;

    /**
     * Language for your wallets' seed.
     */
    #[Json]
    public string $language;

    public static function create(string $filename, string $language, ?string $password = null): RpcRequest
    {
        $self = new self();
        $self->filename = $filename;
        $self->password = $password;
        $self->language = $language;
        return new RpcRequest('create_wallet', $self);
    }
}
