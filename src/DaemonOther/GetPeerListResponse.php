<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use RefRing\MoneroRpcPhp\Model\Peer;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Get the known peers list.
 */
class GetPeerListResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /** @var Peer[] Offline peers */
    #[Json('gray_list', type: Peer::class)]
    public array $grayList = [];

    /** @var Peer[] Online peers. */
    #[Json('white_list', type: Peer::class)]
    public array $whiteList = [];
}
