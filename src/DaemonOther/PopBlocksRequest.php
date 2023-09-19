<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use Square\Pjson\Json;

/**
 * Easily enable merge mining with Monero without requiring software that manually alters the extra field in the coinbase tx to include the merkle root of the aux blocks.
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
