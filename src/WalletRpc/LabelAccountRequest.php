<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Label an account.
 */
class LabelAccountRequest implements ParameterInterface
{
    use JsonSerializeBigInt;

    /**
     * Apply label to account at this index.
     */
    #[Json('account_index')]
    public int $accountIndex;

    /**
     * Label for the account.
     */
    #[Json]
    public string $label;

    public static function create(int $accountIndex, string $label): RpcRequest
    {
        $self = new self();
        $self->accountIndex = $accountIndex;
        $self->label = $label;
        return new RpcRequest('label_account', $self);
    }
}
