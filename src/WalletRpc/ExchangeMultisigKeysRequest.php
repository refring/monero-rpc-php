<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Performs extra multisig keys exchange rounds. Needed for arbitrary M/N multisig wallets
 */
class ExchangeMultisigKeysRequest implements ParameterInterface
{
    use JsonSerialize;

    #[Json]
    public string $password;

    #[Json('multisig_info')]
    public string $multisigInfo;

    /**
     * (Optional, Defaults to false) only require the minimum number of signers to complete this round (including local signer) ( minimum = num_signers - (round num - 1).
     */
    #[Json('force_update_use_with_caution', omit_empty: true)]
    public ?bool $forceUpdateUseWithCaution;

    public static function create(
        string $password,
        string $multisigInfo,
        ?bool $forceUpdateUseWithCaution = null,
    ): RpcRequest {
        $self = new self();
        $self->password = $password;
        $self->multisigInfo = $multisigInfo;
        $self->forceUpdateUseWithCaution = $forceUpdateUseWithCaution;
        return new RpcRequest('exchange_multisig_keys', $self);
    }
}
