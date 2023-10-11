<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

class ChainInformation
{
    use JsonSerializeBigInt;

    /**
     * the block hash of the first diverging block of this alternative chain.
     */
    #[Json('block_hash')]
    public BlockHash $blockHash;

    /**
     * @var BlockHash[] An array of all block hashes in the alternative chain that are not in the main chain.
     */
    #[Json('block_hashes', type: BlockHash::class)]
    public array $blockHashes = [];

    /**
     * Least-significant 64 bits of 128-bit integer for the cumulative difficulty of all blocks in the alternative chain.
     */
    #[Json]
    public int $difficulty;

    /**
     * Most-significant 64 bits of the 128-bit network difficulty.
     */
    #[Json('difficulty_top64')]
    public int $difficultyTop64;

    /**
     * the block height of the first diverging block of this alternative chain.
     */
    #[Json]
    public int $height;

    /**
     * the length in blocks of this alternative chain, after divergence.
     */
    #[Json]
    public int $length;

    /**
     * The hash of the greatest height block that is shared between the alternative chain and the main chain.
     */
    #[Json('main_chain_parent_block')]
    public string $mainChainParentBlock;

    /**
     * Network difficulty (analogous to the strength of the network) as a hexadecimal string representing a 128-bit number.
     */
    #[Json('wide_difficulty')]
    public string $wideDifficulty;

    /**
     * @param BlockHash[] $blockHashes
     */
    public function __construct(
        BlockHash $blockHash,
        array $blockHashes,
        int $difficulty,
        int $difficultyTop64,
        int $height,
        int $length,
        string $mainChainParentBlock,
        string $wideDifficulty,
    ) {
        $this->blockHash = $blockHash;
        $this->blockHashes = $blockHashes;
        $this->difficulty = $difficulty;
        $this->difficultyTop64 = $difficultyTop64;
        $this->height = $height;
        $this->length = $length;
        $this->mainChainParentBlock = $mainChainParentBlock;
        $this->wideDifficulty = $wideDifficulty;
    }
}
