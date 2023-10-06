<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Returns details for each transaction in an unsigned or multisig transaction set. Transaction sets are obtained as return values from one of the following RPC methods:* transfer* transfer_split* sweep_all* sweep_single* sweep_dustThese methods return unsigned transaction sets if the wallet is view-only (i.e. the wallet was created without the private spend key).<p style="color:red;"><b>WARNING</b> Verify that the transfer has a sane <code>unlock_time</code> otherwise the funds might be inaccessible.</p>
 */
class DescribeTransferRequest implements ParameterInterface
{
    use JsonSerializeBigInt;

    /**
     * A hexadecimal string representing a set of unsigned transactions (empty for multisig transactions; non-multisig signed transactions are not supported).
     */
    #[Json('unsigned_txset', omit_empty: true)]
    public ?string $unsignedTxset;

    /**
     * A hexadecimal string representing the set of signing keys used in a multisig transaction (empty for unsigned transactions; non-multisig signed transactions are not supported).
     */
    #[Json('multisig_txset', omit_empty: true)]
    public ?string $multisigTxset;

    public static function create(?string $unsignedTxset = null, ?string $multisigTxset = null): RpcRequest
    {
        $self = new self();
        $self->unsignedTxset = $unsignedTxset;
        $self->multisigTxset = $multisigTxset;
        return new RpcRequest('describe_transfer', $self);
    }
}
