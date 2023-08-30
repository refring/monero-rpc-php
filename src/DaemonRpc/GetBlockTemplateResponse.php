<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get a block template on which mining a new block.Alias: *getblocktemplate*.
 */
class GetBlockTemplateResponse
{
	use JsonSerialize;

    /**
     * Blob on which to try to find a valid nonce.
     */
    #[Json('blockhashing_blob')]
    public string $blockhashingBlob;

    /**
	 * Blob on which to try to mine a new block.
	 */
	#[Json('blocktemplate_blob')]
	public string $blocktemplateBlob;

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
	public string $nextSeedHash;

	/**
	 * Hash of the most recent block on which to mine the next block.
	 */
	#[Json('prev_hash')]
	public string $prevHash;

	/**
	 * Reserved offset.
	 */
	#[Json('reserved_offset')]
	public int $reservedOffset;

	/**
	 * Hash of block to use as seed for Random-X proof-of-work.
	 */
	#[Json('seed_hash')]
	public string $seedHash;

	/**
	 * Height of block to use as seed for Random-X proof-of-work.
	 */
	#[Json('seed_height')]
	public int $seedHeight;

	/**
	 * General RPC error code. "OK" means everything looks good.
	 */
	#[Json]
	public string $status;

	/**
	 * States if the result is obtained using the bootstrap mode, and is therefore not trusted (`true`), or when the daemon is fully synced and thus handles the RPC locally (`false`)
	 */
	#[Json]
	public bool $untrusted;

	/**
	 * Network difficulty (analogous to the strength of the network) as a hexadecimal string representing a 128-bit number.
	 */
	#[Json('wide_difficulty')]
	public string $wideDifficulty;
}
