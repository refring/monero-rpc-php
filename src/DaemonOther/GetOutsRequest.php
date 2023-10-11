<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Model\GetOutputsOut;
use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use Square\Pjson\Json;

/**
 * Get outputs.
 */
class GetOutsRequest extends OtherRpcRequest
{
    /** @var GetOutputsOut[] */
    #[Json]
    public array $outputs;

    /**
     * If `true`, a *txid* will included for each output in the response.
     */
    #[Json('get_txid')]
    public bool $getTxid;

    /**
     * @param GetOutputsOut[] $outputs
     */
    public static function create(array $outputs, bool $getTxid): OtherRpcRequest
    {
        $self = new self();
        $self->outputs = $outputs;
        $self->getTxid = $getTxid;
        return $self;
    }
}
