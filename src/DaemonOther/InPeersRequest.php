<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Limit number of Incoming peers.
 */
class InPeersRequest extends OtherRpcRequest
{
    use JsonSerializeBigInt;

    /**
     * Max number of incoming peers
     */
    #[Json('in_peers')]
    public int $inPeers;

    public static function create(int $inPeers): OtherRpcRequest
    {
        $self = new self();
        $self->inPeers = $inPeers;
        return $self;
    }
}
