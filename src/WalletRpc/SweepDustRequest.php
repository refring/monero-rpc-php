<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Send all dust outputs back to the wallet's, to make them easier to spend (and mix).Alias: *sweep_unmixable*.
 */
class SweepDustRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * (Optional) Return the transaction keys after sending.
     */
    #[Json('get_tx_keys', omit_empty: true)]
    public ?bool $getTxKeys;

    /**
     * (Optional) If true, the newly created transaction will not be relayed to the monero network. (Defaults to false)
     */
    #[Json('do_not_relay', omit_empty: true)]
    public ?bool $doNotRelay;

    /**
     * (Optional) Return the transactions as hex string after sending. (Defaults to false)
     */
    #[Json('get_tx_hex', omit_empty: true)]
    public ?bool $getTxHex;

    /**
     * (Optional) Return list of transaction metadata needed to relay the transfer later. (Defaults to false)
     */
    #[Json('get_tx_metadata', omit_empty: true)]
    public ?bool $getTxMetadata;

    public static function create(
        ?bool $getTxKeys = null,
        ?bool $doNotRelay = null,
        ?bool $getTxHex = null,
        ?bool $getTxMetadata = null,
    ): RpcRequest {
        $self = new self();
        $self->getTxKeys = $getTxKeys;
        $self->doNotRelay = $doNotRelay;
        $self->getTxHex = $getTxHex;
        $self->getTxMetadata = $getTxMetadata;
        return new RpcRequest('sweep_dust', $self);
    }
}
