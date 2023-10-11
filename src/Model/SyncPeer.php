<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
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
