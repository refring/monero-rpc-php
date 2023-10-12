<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc\Model;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class SyncPeer implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * As defined in get_connections
     */
    #[Json]
    public ConnectionInfo $info;

    public function __construct(ConnectionInfo $info)
    {
        $this->info = $info;
    }
}
