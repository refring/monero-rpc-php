<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Set the log hash rate display mode.
 */
class SetLogHashRateRequest extends OtherRpcRequest
{
    use JsonSerializeBigInt;

    /**
     * States if hash rate logs should be visible (`true`) or hidden (`false`)
     */
    #[Json]
    public bool $visible;

    public static function create(bool $visible): OtherRpcRequest
    {
        $self = new self();
        $self->visible = $visible;
        return $self;
    }
}
