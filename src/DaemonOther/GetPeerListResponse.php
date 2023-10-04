<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonBaseResponse;
use RefRing\MoneroRpcPhp\Model\Peer;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get the known peers list.
 */
class GetPeerListResponse extends DaemonBaseResponse
{
    use JsonSerialize;

    /** @var Peer[] Offline peers */
    #[Json('gray_list', type: Peer::class)]
    public array $grayList;

    /** @var Peer[] Online peers. */
    #[Json('white_list', type: Peer::class)]
    public array $whiteList;
}
