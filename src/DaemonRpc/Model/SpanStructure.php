<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc\Model;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class SpanStructure implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Id of connection
     */
    #[Json('connection_id')]
    public string $connectionId;

    /**
     * number of blocks in that span
     */
    #[Json]
    public int $nblocks;

    /**
     * connection rate
     */
    #[Json]
    public int $rate;

    /**
     * peer address the node is downloading (or has downloaded) than span from
     */
    #[Json('remote_address')]
    public string $remoteAddress;

    /**
     * total number of bytes in that span's blocks (including txes)
     */
    #[Json]
    public int $size;

    /**
     * connection speed
     */
    #[Json]
    public int $speed;

    /**
     * block height of the first block in that span
     */
    #[Json('start_block_height')]
    public int $startBlockHeight;

    public function __construct(
        string $connectionId,
        int $nblocks,
        int $rate,
        string $remoteAddress,
        int $size,
        int $speed,
        int $startBlockHeight,
    ) {
        $this->connectionId = $connectionId;
        $this->nblocks = $nblocks;
        $this->rate = $rate;
        $this->remoteAddress = $remoteAddress;
        $this->size = $size;
        $this->speed = $speed;
        $this->startBlockHeight = $startBlockHeight;
    }
}
