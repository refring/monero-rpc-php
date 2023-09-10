<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp;

use RefRing\MoneroRpcPhp\DaemonRpc\GenerateblocksRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GenerateblocksResponse;
use RefRing\MoneroRpcPhp\Exception\MoneroRpcException;

class RegtestRpcClient extends DaemonRpcClient
{
    /**
     * Generate a block and specify the address to receive the coinbase reward.
     *
     * @param int $amountOfBlocks number of blocks to be generated.
     * @param string $walletAddress address to receive the coinbase reward.
     * @param ?string $prevBlock
     * @param ?int $startingNonce Increased by miner untill it finds a matching result that solves a block.
     * @throws MoneroRpcException
     */
    public function generateblocks(
        int $amountOfBlocks,
        string $walletAddress,
        ?string $prevBlock = null,
        ?int $startingNonce = null,
    ): GenerateblocksResponse {
        return $this->handleRequest(GenerateblocksRequest::create($amountOfBlocks, $walletAddress, $prevBlock, $startingNonce), GenerateblocksResponse::class);
    }
}
