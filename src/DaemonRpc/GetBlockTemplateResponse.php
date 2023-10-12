<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\BlockHash;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get a block template on which mining a new block.
 */
class GetBlockTemplateResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * Blob on which to try to mine a new block.
     */
    #[Json('blocktemplate_blob')]
    public string $blocktemplateBlob;

    /**
     * Blob on which to try to find a valid nonce.
     */
    #[Json('blockhashing_blob')]
    public string $blockhashingBlob;

    /**
     * Least-significant 64 bits of the 128-bit network difficulty.
     */
    #[Json]
    public int $difficulty;

    /**
     * Most-significant 64 bits of the 128-bit network difficulty.
     */
    #[Json('difficulty_top64')]
    public int $difficultyTop64;

    /**
     * Coinbase reward expected to be received if block is successfully mined.
     */
    #[Json('expected_reward')]
    public int $expectedReward;

    /**
     * Height on which to mine.
     */
    #[Json]
    public int $height;

    /**
     * Hash of the next block to use as seed for Random-X proof-of-work.
     */
    #[Json('next_seed_hash')]
    public BlockHash $nextSeedHash;

    /**
     * Hash of the most recent block on which to mine the next block.
     */
    #[Json('prev_hash')]
    public BlockHash $prevHash;

    /**
     * Reserved offset.
     */
    #[Json('reserved_offset')]
    public int $reservedOffset;

    /**
     * Hash of block to use as seed for Random-X proof-of-work.
     */
    #[Json('seed_hash')]
    public BlockHash $seedHash;

    /**
     * Height of block to use as seed for Random-X proof-of-work.
     */
    #[Json('seed_height')]
    public int $seedHeight;

    /**
     * Network difficulty (analogous to the strength of the network) as a hexadecimal string representing a 128-bit number.
     */
    #[Json('wide_difficulty')]
    public string $wideDifficulty;
}
