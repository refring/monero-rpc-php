<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Show information about a transfer to/from this address.<p style="color:red;"><b>WARNING</b> Verify that the transfer has a sane <code>unlock_time</code> otherwise the funds might be inaccessible.</p>
 */
class GetTransferByTxidRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * Transaction ID used to find the transfer.
     */
    #[Json]
    public string $txid;

    /**
     * (Optional) Index of the account to query for the transfer.
     */
    #[Json('account_index', omit_empty: true)]
    public ?int $accountIndex;


    public static function create(string $txid, ?int $accountIndex = null): RpcRequest
    {
        $self = new self();
        $self->txid = $txid;
        $self->accountIndex = $accountIndex;
        return new RpcRequest('get_transfer_by_txid', $self);
    }
}
