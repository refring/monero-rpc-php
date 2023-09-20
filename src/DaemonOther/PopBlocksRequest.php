<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use Square\Pjson\Json;

/**
 * Remove blocks from the blockchain
 */
class PopBlocksRequest extends OtherRpcRequest
{
    #[Json('nblocks')]
    public int $numberOfBlocks;

    public static function create(int $numberOfBlocks): OtherRpcRequest
    {
        $self = new self();
        $self->numberOfBlocks = $numberOfBlocks;
        return $self;
    }
}
