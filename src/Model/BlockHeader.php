<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class BlockHeader
{
	use JsonSerialize;

	/**
	 * Backward compatibility, same as *block_weight*, use that instead
	 */
	#[Json('block_size')]
	public int $blockSize;

	/**
	 * The adjusted block size, in bytes. This is the raw size, plus a positive adjustment for any Bulletproof transactions with more than 2 outputs.
	 */
	#[Json('block_weight')]
	public int $blockWeight;

	/**
	 * Least-significant 64 bits of the cumulative difficulty of all blocks up to the block in the reply.
	 */
	#[Json('cumulative_difficulty')]
	public int $cumulativeDifficulty;

	/**
	 * Most-significant 64 bits of the 128-bit cumulative difficulty.
	 */
	#[Json('cumulative_difficulty_top64')]
	public int $cumulativeDifficultyTop64;

	/**
	 * The number of blocks succeeding this block on the blockchain. A larger number means an older block.
	 */
	#[Json]
	public int $depth;

	/**
	 * The strength of the Monero network based on mining power.
	 */
	#[Json]
	public int $difficulty;

	/**
	 * Most-significant 64 bits of the 128-bit network difficulty.
	 */
	#[Json('difficulty_top64')]
	public int $difficultyTop64;

	/**
	 * The hash of this block.
	 */
	#[Json]
	public string $hash;

	/**
	 * The number of blocks preceding this block on the blockchain.
	 */
	#[Json]
	public int $height;

	/**
	 * The long term block weight, based on the median weight of the preceding 100000 blocks.
	 */
	#[Json('long_term_weight')]
	public int $longTermWeight;

	/**
	 * The major version of the monero protocol at this block height.
	 */
	#[Json('major_version')]
	public int $majorVersion;

	/**
	 * The hash of this block's coinbase transaction.
	 */
	#[Json('miner_tx_hash')]
	public string $minerTxHash;

	/**
	 * The minor version of the monero protocol at this block height.
	 */
	#[Json('minor_version')]
	public int $minorVersion;

	/**
	 * a cryptographic random one-time number used in mining a Monero block.
	 */
	#[Json]
	public int $nonce;

	/**
	 * Number of transactions in the block, not counting the coinbase tx.
	 */
	#[Json('num_txes')]
	public int $numTxes;

	/**
	 * Usually `false`. If `true`, this block is not part of the longest chain.
	 */
	#[Json('orphan_status')]
	public bool $orphanStatus;

	/**
	 * The hash, as a hexadecimal string, calculated from the block as proof-of-work.
	 */
	#[Json('pow_hash')]
	public string $powHash;

	/**
	 * The hash of the block immediately preceding this block in the chain.
	 */
	#[Json('prev_hash')]
	public string $prevHash;

	/**
	 * The amount of new @atomic-units generated in this block and rewarded to the miner. Note: 1 XMR = 1e12 @atomic-units.
	 */
	#[Json]
	public int $reward;

	/**
	 * The unix time at which the block was recorded into the blockchain.
	 */
	#[Json]
	public int $timestamp;

	/**
	 * Cumulative difficulty of all blocks in the blockchain as a hexadecimal string representing a 128-bit number.
	 */
	#[Json('wide_cumulative_difficulty')]
	public string $wideCumulativeDifficulty;

	/**
	 * Network difficulty (analogous to the strength of the network) as a hexadecimal string representing a 128-bit number.
	 */
	#[Json('wide_difficulty')]
	public string $wideDifficulty;


	public function __construct(
		int $blockSize,
		int $blockWeight,
		int $cumulativeDifficulty,
		int $cumulativeDifficultyTop64,
		int $depth,
		int $difficulty,
		int $difficultyTop64,
		string $hash,
		int $height,
		int $longTermWeight,
		int $majorVersion,
		string $minerTxHash,
		int $minorVersion,
		int $nonce,
		int $numTxes,
		bool $orphanStatus,
		string $powHash,
		string $prevHash,
		int $reward,
		int $timestamp,
		string $wideCumulativeDifficulty,
		string $wideDifficulty,
	) {
		$this->blockSize = $blockSize;
		$this->blockWeight = $blockWeight;
		$this->cumulativeDifficulty = $cumulativeDifficulty;
		$this->cumulativeDifficultyTop64 = $cumulativeDifficultyTop64;
		$this->depth = $depth;
		$this->difficulty = $difficulty;
		$this->difficultyTop64 = $difficultyTop64;
		$this->hash = $hash;
		$this->height = $height;
		$this->longTermWeight = $longTermWeight;
		$this->majorVersion = $majorVersion;
		$this->minerTxHash = $minerTxHash;
		$this->minorVersion = $minorVersion;
		$this->nonce = $nonce;
		$this->numTxes = $numTxes;
		$this->orphanStatus = $orphanStatus;
		$this->powHash = $powHash;
		$this->prevHash = $prevHash;
		$this->reward = $reward;
		$this->timestamp = $timestamp;
		$this->wideCumulativeDifficulty = $wideCumulativeDifficulty;
		$this->wideDifficulty = $wideDifficulty;
	}
}
