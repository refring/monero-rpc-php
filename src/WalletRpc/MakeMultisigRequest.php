<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Make a wallet multisig by importing peers multisig string.Alias: *None*.
 */
class MakeMultisigRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * @var string[] List of multisig string from peers.
     */
    #[Json('multisig_info')]
    public array $multisigInfo;

    /**
     * Amount of signatures needed to sign a transfer. Must be less or equal than the amount of signature in `multisig_info`.
     */
    #[Json]
    public int $threshold;

    /**
     * (Optional) Wallet password
     */
    #[Json(omit_empty: true)]
    public ?string $password;


    /**
     * @param string[] $multisigInfo
     */
    public static function create(array $multisigInfo, int $threshold, ?string $password = null): RpcRequest
    {
        $self = new self();
        $self->multisigInfo = $multisigInfo;
        $self->threshold = $threshold;
        $self->password = $password;
        return new RpcRequest('make_multisig', $self);
    }
}
