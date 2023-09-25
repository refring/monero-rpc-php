<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class EstimateTxSizeAndWeightRequest implements ParameterInterface
{
    use JsonSerialize;

    #[Json('n_inputs')]
    public int $nInputs;

    #[Json('n_outputs')]
    public int $nOutputs;

    /**
     * Sets ringsize to n (mixin + 1). (Unless dealing with pre rct outputs, this field is ignored on mainnet).
     */
    #[Json('ring_size')]
    public int $ringSize;

    /**
     * Is this a Ring Confidential Transaction (post blockheight 1220516)
     */
    #[Json]
    public bool $rct;

    public static function create(int $nInputs, int $nOutputs, int $ringSize, bool $rct): RpcRequest
    {
        $self = new self();
        $self->nInputs = $nInputs;
        $self->nOutputs = $nOutputs;
        $self->ringSize = $ringSize;
        $self->rct = $rct;
        return new RpcRequest('estimate_tx_size_and_weight', $self);
    }
}
