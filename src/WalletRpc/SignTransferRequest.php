<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Sign a transaction created on a read-only wallet (in cold-signing process)
 */
class SignTransferRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * string. Set of unsigned tx returned by "transfer" or "transfer_split" methods.
     */
    #[Json('unsigned_txset')]
    public string $unsignedTxset;

    /**
     * (Optional) If true, return the raw transaction data. (Defaults to false)
     */
    #[Json('export_raw', omit_empty: true)]
    public ?bool $exportRaw;

    /**
     * (Optional) Return the transaction keys after signing.
     */
    #[Json('get_tx_keys', omit_empty: true)]
    public ?bool $getTxKeys;


    public static function create(string $unsignedTxset, ?bool $exportRaw = null, ?bool $getTxKeys = null): RpcRequest
    {
        $self = new self();
        $self->unsignedTxset = $unsignedTxset;
        $self->exportRaw = $exportRaw;
        $self->getTxKeys = $getTxKeys;
        return new RpcRequest('sign_transfer', $self);
    }
}
