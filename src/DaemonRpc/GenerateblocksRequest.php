<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Generate a block and specify the address to receive the coinbase reward.
 */
class GenerateblocksRequest implements ParameterInterface
{
    use JsonSerializeBigInt;

    /**
     * number of blocks to be generated.
     */
    #[Json('amount_of_blocks')]
    public int $amountOfBlocks;

    /**
     * address to receive the coinbase reward.
     */
    #[Json('wallet_address')]
    public string $walletAddress;

    #[Json('prev_block', omit_empty: true)]
    public ?string $prevBlock;

    /**
     * Increased by miner until it finds a matching result that solves a block.
     */
    #[Json('starting_nonce', omit_empty: true)]
    public ?int $startingNonce;

    public static function create(
        int $amountOfBlocks,
        string $walletAddress,
        ?string $prevBlock = null,
        ?int $startingNonce = null,
    ): RpcRequest {
        $self = new self();
        $self->amountOfBlocks = $amountOfBlocks;
        $self->walletAddress = $walletAddress;
        $self->prevBlock = $prevBlock;
        $self->startingNonce = $startingNonce;
        return new RpcRequest('generateblocks', $self);
    }
}
