<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Submit a signed multisig transaction.
 */
class SubmitMultisigRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * Multisig transaction in hex format, as returned by `sign_multisig` under `tx_data_hex`.
     */
    #[Json('tx_data_hex')]
    public string $txDataHex;


    public static function create(string $txDataHex): RpcRequest
    {
        $self = new self();
        $self->txDataHex = $txDataHex;
        return new RpcRequest('submit_multisig', $self);
    }
}
