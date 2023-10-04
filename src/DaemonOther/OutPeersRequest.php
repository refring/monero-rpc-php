<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Limit number of Outgoing peers.
 */
class OutPeersRequest extends OtherRpcRequest
{
    use JsonSerialize;

    /**
     * Max number of outgoing peers
     */
    #[Json('out_peers')]
    public int $outPeers;

    public static function create(int $outPeers): OtherRpcRequest
    {
        $self = new self();
        $self->outPeers = $outPeers;
        return $self;
    }
}
