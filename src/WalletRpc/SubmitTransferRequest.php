<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Submit a previously signed transaction on a read-only wallet (in cold-signing process).
 */
class SubmitTransferRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * Set of signed tx returned by "sign_transfer"
     */
    #[Json('tx_data_hex')]
    public string $txDataHex;


    public static function create(string $txDataHex): RpcRequest
    {
        $self = new self();
        $self->txDataHex = $txDataHex;
        return new RpcRequest('submit_transfer', $self);
    }
}
