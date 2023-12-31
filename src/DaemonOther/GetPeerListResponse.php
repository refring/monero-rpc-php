<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonOther\Model\Peer;
use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Get the known peers list.
 */
class GetPeerListResponse implements JsonDataSerializable
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
