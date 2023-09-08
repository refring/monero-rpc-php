<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Enum\ResponseStatus;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Retrieve general information about the state of your node and the network.Alias:* * /get_info** * /getinfo*See other RPC Methods [/get_info (not JSON)](#get_info-not-json)
 */
class GetInfoResponse
{
    use JsonSerialize;

    /**
     * Current time approximated from chain data, as Unix time.
     */
    #[Json('adjusted_time')]
    public int $adjustedTime;

    /**
     * Number of alternative blocks to main chain.
     */
    #[Json('alt_blocks_count')]
    public int $altBlocksCount;

    /**
     * Backward compatibility, same as *block_weight_limit*, use that instead
     */
    #[Json('block_size_limit')]
    public int $blockSizeLimit;

    /**
     * Backward compatibility, same as *block_weight_median*, use that instead
     */
    #[Json('block_size_median')]
    public int $blockSizeMedian;

    /**
     * Maximum allowed adjusted block size based on latest 100000 blocks
     */
    #[Json('block_weight_limit')]
    public int $blockWeightLimit;

    /**
     * Median adjusted block size of latest 100000 blocks
     */
    #[Json('block_weight_median')]
    public int $blockWeightMedian;

    /**
     * @Bootstrap-node to give immediate usability to wallets while syncing by proxying RPC to it. (Note: the replies may be untrustworthy).
     */
    #[Json('bootstrap_daemon_address')]
    public string $bootstrapDaemonAddress;

    /**
     * States if new blocks are being added (`true`) or not (`false`).
     */
    #[Json('busy_syncing')]
    public bool $busySyncing;

    /**
     * If payment for RPC is enabled, the number of credits available to the requesting client. Otherwise, 0.
     */
    #[Json]
    public int $credits;

    /**
     * Least-significant 64 bits of the 128-bit cumulative difficulty.
     */
    #[Json('cumulative_difficulty')]
    public int $cumulativeDifficulty;

    /**
     * Most-significant 64 bits of the 128-bit cumulative difficulty.
     */
    #[Json('cumulative_difficulty_top64')]
    public int $cumulativeDifficultyTop64;

    /**
     * The size of the blockchain database, in bytes.
     */
    #[Json('database_size')]
    public int $databaseSize;

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
     * Available disk space on the node.
     */
    #[Json('free_space')]
    public int $freeSpace;

    /**
     * Grey Peerlist Size
     */
    #[Json('grey_peerlist_size')]
    public int $greyPeerlistSize;

    /**
     * Current length of longest chain known to daemon.
     */
    #[Json]
    public int $height;

    /**
     * Current length of the local chain of the daemon.
     */
    #[Json('height_without_bootstrap')]
    public int $heightWithoutBootstrap;

    /**
     * Number of peers connected to and pulling from your node.
     */
    #[Json('incoming_connections_count')]
    public int $incomingConnectionsCount;

    /**
     * States if the node is on the mainnet (`true`) or not (`false`).
     */
    #[Json]
    public bool $mainnet;

    /**
     * Network type (one of `mainnet`, `stagenet` or `testnet`).
     */
    #[Json]
    public string $nettype;

    /**
     * States if the node is offline (`true`) or online (`false`).
     */
    #[Json]
    public bool $offline;

    /**
     * Number of peers that you are connected to and getting information from.
     */
    #[Json('outgoing_connections_count')]
    public int $outgoingConnectionsCount;

    /**
     * Number of RPC client connected to the daemon (Including this RPC request).
     */
    #[Json('rpc_connections_count')]
    public int $rpcConnectionsCount;

    /**
     * States if the node is on the stagenet (`true`) or not (`false`).
     */
    #[Json]
    public bool $stagenet;

    /**
     * Start time of the daemon, as UNIX time.
     */
    #[Json('start_time')]
    public int $startTime;

    /**
     * General RPC error code. "OK" means everything looks good.
     */
    #[Json]
    public ResponseStatus $status;

    /**
     * States if the node is synchronized (`true`) or not (`false`).
     */
    #[Json]
    public bool $synchronized;

    /**
     * Current target for next proof of work.
     */
    #[Json]
    public int $target;

    /**
     * The height of the next block in the chain.
     */
    #[Json('target_height')]
    public int $targetHeight;

    /**
     * States if the node is on the testnet (`true`) or not (`false`).
     */
    #[Json]
    public bool $testnet;

    /**
     * Hash of the highest block in the chain.
     */
    #[Json('top_block_hash')]
    public string $topBlockHash;

    /**
     * If payment for RPC is enabled, the hash of the highest block in the chain. Otherwise, empty.
     */
    #[Json('top_hash')]
    public string $topHash;

    /**
     * Total number of non-coinbase transaction in the chain.
     */
    #[Json('tx_count')]
    public int $txCount;

    /**
     * Number of transactions that have been broadcast but not included in a block.
     */
    #[Json('tx_pool_size')]
    public int $txPoolSize;

    /**
     * States if the result is obtained using the bootstrap mode, and is therefore not trusted (`true`), or when the daemon is fully synced and thus handles the RPC locally (`false`)
     */
    #[Json]
    public bool $untrusted;

    /**
     * States if a newer Monero software version is available.
     */
    #[Json('update_available')]
    public bool $updateAvailable;

    /**
     * The version of the Monero software the node is running.
     */
    #[Json]
    public string $version;

    /**
     * States if a bootstrap node has ever been used since the daemon started.
     */
    #[Json('was_bootstrap_ever_used')]
    public bool $wasBootstrapEverUsed;

    /**
     * White Peerlist Size
     */
    #[Json('white_peerlist_size')]
    public int $whitePeerlistSize;

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
}
