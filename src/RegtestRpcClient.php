<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp;

use RefRing\MoneroRpcPhp\DaemonRpc\GenerateblocksRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GenerateblocksResponse;

class RegtestRpcClient extends JsonRpcClient
{
    public function generateblocks(
        int $amountOfBlocks,
        string $walletAddress,
        string $prevBlock = null,
        int $startingNonce = null,
    ): GenerateblocksResponse
    {
        return $this->handleRequest(GenerateblocksRequest::create($amountOfBlocks, $walletAddress, $prevBlock, $startingNonce), GenerateblocksResponse::class);
    }
}
