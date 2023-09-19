<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp;

use RefRing\MoneroRpcPhp\DaemonOther\GetNetStatsRequest;
use RefRing\MoneroRpcPhp\DaemonOther\GetNetStatsResponse;
use RefRing\MoneroRpcPhp\DaemonOther\PopBlocksRequest;
use RefRing\MoneroRpcPhp\DaemonOther\PopBlocksResponse;
use RefRing\MoneroRpcPhp\Exception\MoneroRpcException;

class DaemonOtherClient extends JsonRpcClient
{
    /**
     * Remove blocks from the blockchain
     *
     * @throws MoneroRpcException
     */
    public function popBlocks(int $numberOfBlocks): PopBlocksResponse
    {
        $this->endPointPath = '/pop_blocks';
        return $this->handleRequest(PopBlocksRequest::create($numberOfBlocks), PopBlocksResponse::class);
    }

    /**
     * Remove blocks from the blockchain
     *
     * @throws MoneroRpcException
     */
    public function getNetStats(): GetNetStatsResponse
    {
        $this->endPointPath = '/get_net_stats';
        return $this->handleRequest(GetNetStatsRequest::create(), GetNetStatsResponse::class);
    }
}
