<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Set daemon bandwidth limits.
 */
class SetLimitRequest extends OtherRpcRequest
{
    use JsonSerializeBigInt;

    /**
     * Download limit in kBytes per second (-1 reset to default, 0 don't change the current limit)
     */
    #[Json('limit_down', omit_empty: true)]
    public ?int $limitDown;

    /**
     * Upload limit in kBytes per second (-1 reset to default, 0 don't change the current limit)
     */
    #[Json('limit_up', omit_empty: true)]
    public ?int $limitUp;

    public static function create(?int $limitDown = null, ?int $limitUp = null): OtherRpcRequest
    {
        $self = new self();
        $self->limitDown = $limitDown;
        $self->limitUp = $limitUp;
        return $self;
    }
}
