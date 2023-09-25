<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Sign a transaction in multisig.
 */
class SignMultisigRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * Multisig transaction in hex format, as returned by `transfer` under `multisig_txset`.
     */
    #[Json('tx_data_hex')]
    public string $txDataHex;

    public static function create(string $txDataHex): RpcRequest
    {
        $self = new self();
        $self->txDataHex = $txDataHex;
        return new RpcRequest('sign_multisig', $self);
    }
}
