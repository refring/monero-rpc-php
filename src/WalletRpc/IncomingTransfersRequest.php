<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\IncomingTransferType;
use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Return a list of incoming transfers to the wallet.
 */
class IncomingTransfersRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * "all": all the transfers, "available": only transfers which are not yet spent, OR "unavailable": only transfers which are already spent.
     */
    #[Json('transfer_type')]
    public IncomingTransferType $transferType;

    /**
     * (Optional) Return transfers for this account. (defaults to 0)
     */
    #[Json('account_index', omit_empty: true)]
    public ?int $accountIndex;

    /**
     * @var int[] (Optional) Return transfers sent to these subaddresses.
     */
    #[Json('subaddr_indices', omit_empty: true)]
    public ?array $subaddrIndices;


    /**
     * @param ?int[] $subaddrIndices
     */
    public static function create(
        IncomingTransferType $transferType,
        ?int                 $accountIndex = null,
        ?array               $subaddrIndices = null,
    ): RpcRequest {
        $self = new self();
        $self->transferType = $transferType;
        $self->accountIndex = $accountIndex;
        $self->subaddrIndices = $subaddrIndices;
        return new RpcRequest('incoming_transfers', $self);
    }
}
