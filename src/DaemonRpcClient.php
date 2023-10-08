<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp;

use RefRing\MoneroRpcPhp\DaemonOther\GetAltBlocksHashesRequest;
use RefRing\MoneroRpcPhp\DaemonOther\GetAltBlocksHashesResponse;
use RefRing\MoneroRpcPhp\DaemonOther\GetHeightRequest;
use RefRing\MoneroRpcPhp\DaemonOther\GetHeightResponse;
use RefRing\MoneroRpcPhp\DaemonOther\GetLimitRequest;
use RefRing\MoneroRpcPhp\DaemonOther\GetLimitResponse;
use RefRing\MoneroRpcPhp\DaemonOther\GetNetStatsRequest;
use RefRing\MoneroRpcPhp\DaemonOther\GetNetStatsResponse;
use RefRing\MoneroRpcPhp\DaemonOther\GetPeerListRequest;
use RefRing\MoneroRpcPhp\DaemonOther\GetPeerListResponse;
use RefRing\MoneroRpcPhp\DaemonOther\GetTransactionPoolStatsRequest;
use RefRing\MoneroRpcPhp\DaemonOther\GetTransactionPoolStatsResponse;
use RefRing\MoneroRpcPhp\DaemonOther\InPeersRequest;
use RefRing\MoneroRpcPhp\DaemonOther\InPeersResponse;
use RefRing\MoneroRpcPhp\DaemonOther\IsKeyImageSpentRequest;
use RefRing\MoneroRpcPhp\DaemonOther\IsKeyImageSpentResponse;
use RefRing\MoneroRpcPhp\DaemonOther\MiningStatusRequest;
use RefRing\MoneroRpcPhp\DaemonOther\MiningStatusResponse;
use RefRing\MoneroRpcPhp\DaemonOther\OutPeersRequest;
use RefRing\MoneroRpcPhp\DaemonOther\OutPeersResponse;
use RefRing\MoneroRpcPhp\DaemonOther\PopBlocksRequest;
use RefRing\MoneroRpcPhp\DaemonOther\PopBlocksResponse;
use RefRing\MoneroRpcPhp\DaemonOther\SaveBlockchainRequest;
use RefRing\MoneroRpcPhp\DaemonOther\SaveBlockchainResponse;
use RefRing\MoneroRpcPhp\DaemonOther\SendRawTransactionRequest;
use RefRing\MoneroRpcPhp\DaemonOther\SendRawTransactionResponse;
use RefRing\MoneroRpcPhp\DaemonOther\SetBootstrapDaemonRequest;
use RefRing\MoneroRpcPhp\DaemonOther\SetBootstrapDaemonResponse;
use RefRing\MoneroRpcPhp\DaemonOther\SetLimitRequest;
use RefRing\MoneroRpcPhp\DaemonOther\SetLimitResponse;
use RefRing\MoneroRpcPhp\DaemonOther\SetLogCategoriesRequest;
use RefRing\MoneroRpcPhp\DaemonOther\SetLogCategoriesResponse;
use RefRing\MoneroRpcPhp\DaemonOther\SetLogHashRateRequest;
use RefRing\MoneroRpcPhp\DaemonOther\SetLogHashRateResponse;
use RefRing\MoneroRpcPhp\DaemonOther\SetLogLevelRequest;
use RefRing\MoneroRpcPhp\DaemonOther\SetLogLevelResponse;
use RefRing\MoneroRpcPhp\DaemonOther\StartMiningRequest;
use RefRing\MoneroRpcPhp\DaemonOther\StartMiningResponse;
use RefRing\MoneroRpcPhp\DaemonOther\StopMiningRequest;
use RefRing\MoneroRpcPhp\DaemonOther\StopMiningResponse;
use RefRing\MoneroRpcPhp\DaemonOther\UpdateRequest;
use RefRing\MoneroRpcPhp\DaemonOther\UpdateResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\AddAuxPowRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\AddAuxPowResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\BannedRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\BannedResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\CalcPowRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\CalcPowResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\FlushCacheRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\FlushCacheResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\FlushTxpoolRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\FlushTxpoolResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GenerateblocksRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GenerateblocksResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetAlternateChainsRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetAlternateChainsResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBansRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBansResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockCountRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockCountResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockHeaderByHashRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockHeaderByHashResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockHeaderByHeightRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockHeaderByHeightResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockHeadersRangeRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockHeadersRangeResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockTemplateRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockTemplateResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetCoinbaseTxSumRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetCoinbaseTxSumResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetConnectionsRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetConnectionsResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetFeeEstimateRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetFeeEstimateResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetInfoRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetInfoResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetLastBlockHeaderRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetLastBlockHeaderResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetMinerDataRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetMinerDataResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetOutputDistributionRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetOutputDistributionResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetOutputHistogramRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetOutputHistogramResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetTxpoolBacklogRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetTxpoolBacklogResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetVersionRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetVersionResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\HardForkInfoRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\HardForkInfoResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\OnGetBlockHashRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\OnGetBlockHashResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\PruneBlockchainRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\PruneBlockchainResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\RelayTxRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\RelayTxResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\SetBansRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\SetBansResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\SubmitBlockRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\SubmitBlockResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\SyncInfoRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\SyncInfoResponse;
use RefRing\MoneroRpcPhp\Enum\ErrorCode;
use RefRing\MoneroRpcPhp\Enum\UpdateCommand;
use RefRing\MoneroRpcPhp\Exception\BlockNotAcceptedException;
use RefRing\MoneroRpcPhp\Exception\InvalidBlockHeightException;
use RefRing\MoneroRpcPhp\Exception\InvalidBlockTemplateBlobException;
use RefRing\MoneroRpcPhp\Exception\MoneroRpcException;
use RefRing\MoneroRpcPhp\Model\AuxPow;
use RefRing\MoneroRpcPhp\Model\BlockHash;
use RefRing\MoneroRpcPhp\Model\BlockHeight;
use RefRing\MoneroRpcPhp\Model\Node;

class DaemonRpcClient extends JsonRpcClient
{
    /**
     * Look up how many blocks are in the longest chain known to the node.
     *
     * @throws MoneroRpcException
     */
    public function getBlockCount(): GetBlockCountResponse
    {
        return $this->handleRequest(GetBlockCountRequest::create(), GetBlockCountResponse::class);
    }


    /**
     * Look up a block's hash by its height.
     *
     * @param int $blockHeight
     * @throws MoneroRpcException
     * @throws InvalidBlockHeightException
     */
    public function onGetBlockHash(int $blockHeight): OnGetBlockHashResponse
    {
        $result = $this->handleRequest(OnGetBlockHashRequest::create($blockHeight), OnGetBlockHashResponse::class);
        if ((string) $result === '0000000000000000000000000000000000000000000000000000000000000000') {
            throw ErrorCode::InvalidBlockHeight->toException($blockHeight);
        }

        return $result;
    }


    /**
     * Get a block template on which mining a new block.
     *
     * @param string $walletAddress Address of wallet to receive coinbase transactions if block is successfully mined.
     * @param int $reserveSize Reserve size.
     * @throws MoneroRpcException
     */
    public function getBlockTemplate(string $walletAddress, int $reserveSize): GetBlockTemplateResponse
    {
        return $this->handleRequest(GetBlockTemplateRequest::create($walletAddress, $reserveSize), GetBlockTemplateResponse::class);
    }


    /**
     * Submit a mined block to the network.
     *
     * @param string[] $values
     * @return SubmitBlockResponse
     * @throws BlockNotAcceptedException
     * @throws InvalidBlockTemplateBlobException
     */
    public function submitBlock(array $values): SubmitBlockResponse
    {
        return $this->handleRequest(SubmitBlockRequest::create($values), SubmitBlockResponse::class);
    }

    /**
     * Block header information for the most recent block is easily retrieved with this method. No inputs are needed.
     *
     * @param bool $fillPowHash (Optional; defaults to `false`) Add PoW hash to block_header response.
     * @throws MoneroRpcException
     */
    public function getLastBlockHeader(?bool $fillPowHash = null): GetLastBlockHeaderResponse
    {
        return $this->handleRequest(GetLastBlockHeaderRequest::create($fillPowHash), GetLastBlockHeaderResponse::class);
    }

    /**
     * Block header information can be retrieved using either a block's hash or height. This method includes a block's hash as an input parameter to retrieve basic information about the block.
     *
     * @param string $hash The block's sha256 hash.
     * @param bool $fillPowHash (Optional; defaults to `false`) Add PoW hash to block_header response.
     * @throws MoneroRpcException
     */
    public function getBlockHeaderByHash(string $hash, ?bool $fillPowHash = null): GetBlockHeaderByHashResponse
    {
        return $this->handleRequest(GetBlockHeaderByHashRequest::create($hash, $fillPowHash), GetBlockHeaderByHashResponse::class);
    }

    /**
     * Similar to @see self::getBlockHeaderByHash() above, this method includes a block's height as an input parameter to retrieve basic information about the block.
     *
     * @param int $height The block's height.
     * @param bool $fillPowHash (Optional; defaults to `false`) Add PoW hash to block_header response.
     * @throws MoneroRpcException
     */
    public function getBlockHeaderByHeight(int $height, ?bool $fillPowHash = null): GetBlockHeaderByHeightResponse
    {
        return $this->handleRequest(GetBlockHeaderByHeightRequest::create($height, $fillPowHash), GetBlockHeaderByHeightResponse::class);
    }

    /**
     * Similar to @see self::getBlockHeaderByHeight() above, but for a range of blocks. This method includes a starting block height and an ending block height as parameters to retrieve basic information about the range of blocks.
     *
     * @param int $startHeight The starting block's height.
     * @param int $endHeight The ending block's height.
     * @param bool $fillPowHash (Optional; defaults to `false`) Add PoW hash to block_header response.
     * @throws MoneroRpcException
     */
    public function getBlockHeadersRange(
        int $startHeight,
        int $endHeight,
        ?bool $fillPowHash = null,
    ): GetBlockHeadersRangeResponse {
        return $this->handleRequest(GetBlockHeadersRangeRequest::create($startHeight, $endHeight, $fillPowHash), GetBlockHeadersRangeResponse::class);
    }

    /**
     * Full block information can be retrieved by either block height or hash, like with the above block header calls. For full block information, both lookups use the same method, but with different input parameters.
     *
     * @param BlockHash|BlockHeight $blockHashOrHeight The block's height OR hash
     * @param bool $fillPowHash (Optional; Default false) Add PoW hash to block_header response.
     * @throws MoneroRpcException
     */
    public function getBlock(BlockHash|BlockHeight $blockHashOrHeight, ?bool $fillPowHash = null): GetBlockResponse
    {
        return $this->handleRequest(GetBlockRequest::create($blockHashOrHeight, $fillPowHash), GetBlockResponse::class);
    }

    /**
     * Retrieve information about incoming and outgoing connections to your node.
     *
     * @throws MoneroRpcException
     */
    public function getConnections(): GetConnectionsResponse
    {
        return $this->handleRequest(GetConnectionsRequest::create(), GetConnectionsResponse::class);
    }

    /**
     * Retrieve general information about the state of your node and the network.Alias:* * /get_info** * /getinfo*See other RPC Methods [/get_info (not JSON)](#get_info-not-json)
     *
     * @throws MoneroRpcException
     */
    public function getInfo(): GetInfoResponse
    {
        return $this->handleRequest(GetInfoRequest::create(), GetInfoResponse::class);
    }

    /**
     * Look up information regarding hard fork voting and readiness.
     *
     * @throws MoneroRpcException
     */
    public function hardForkInfo(): HardForkInfoResponse
    {
        return $this->handleRequest(HardForkInfoRequest::create(), HardForkInfoResponse::class);
    }

    /**
     * Ban another node by IP.
     *
     * @param Node[] $bans A list of nodes to ban:
     * @throws MoneroRpcException
     */
    public function setBans(array $bans): SetBansResponse
    {
        return $this->handleRequest(SetBansRequest::create($bans), SetBansResponse::class);
    }

    /**
     * Get list of banned IPs.
     *
     * @throws MoneroRpcException
     */
    public function getBans(): GetBansResponse
    {
        return $this->handleRequest(GetBansRequest::create(), GetBansResponse::class);
    }

    /**
     * Check if an IP address is banned and for how long.
     *
     * @param string $address
     * @throws MoneroRpcException
     */
    public function banned(string $address): BannedResponse
    {
        return $this->handleRequest(BannedRequest::create($address), BannedResponse::class);
    }

    /**
     * Flush tx ids from transaction pool
     *
     * @param ?string[] $txids Optional, list of transactions IDs to flush from pool (all tx ids flushed if empty).
     * @throws MoneroRpcException
     */
    public function flushTxpool(?array $txids = null): FlushTxpoolResponse
    {
        return $this->handleRequest(FlushTxpoolRequest::create($txids), FlushTxpoolResponse::class);
    }

    /**
     * Get a histogram of output amounts. For all amounts (possibly filtered by parameters), gives the number of outputs on the chain for that amount.RingCT outputs counts as 0 amount.
     *
     * @param int[] $amounts list of unsigned int
     * @param ?int $minCount
     * @param ?int $maxCount
     * @param bool $unlocked
     * @param ?int $recentCutoff
     * @throws MoneroRpcException
     */
    public function getOutputHistogram(
        array $amounts,
        ?int $minCount = null,
        ?int $maxCount = null,
        ?bool $unlocked = null,
        ?int $recentCutoff = null,
    ): GetOutputHistogramResponse {
        return $this->handleRequest(GetOutputHistogramRequest::create($amounts, $minCount, $maxCount, $unlocked, $recentCutoff), GetOutputHistogramResponse::class);
    }

    /**
     * Get the coinbase amount and the fees amount for n last blocks starting at particular height
     *
     * @param int $height Block height from which getting the amounts
     * @param int $count number of blocks to include in the sum
     * @throws MoneroRpcException
     */
    public function getCoinbaseTxSum(int $height, int $count): GetCoinbaseTxSumResponse
    {
        return $this->handleRequest(GetCoinbaseTxSumRequest::create($height, $count), GetCoinbaseTxSumResponse::class);
    }

    /**
     * Get current node version
     *
     * @throws MoneroRpcException
     */
    public function getVersion(): GetVersionResponse
    {
        return $this->handleRequest(GetVersionRequest::create(), GetVersionResponse::class);
    }

    /**
     * Gives an estimation on fees per byte.
     *
     * @param ?int $graceBlocks Optional
     * @throws MoneroRpcException
     */
    public function getFeeEstimate(?int $graceBlocks = null): GetFeeEstimateResponse
    {
        return $this->handleRequest(GetFeeEstimateRequest::create($graceBlocks), GetFeeEstimateResponse::class);
    }

    /**
     * Display alternative chains seen by the node.
     *
     * @throws MoneroRpcException
     */
    public function getAlternateChains(): GetAlternateChainsResponse
    {
        return $this->handleRequest(GetAlternateChainsRequest::create(), GetAlternateChainsResponse::class);
    }

    /**
     * Relay a list of transaction IDs.
     *
     * @param string[] $txids list of transaction IDs to relay
     * @throws MoneroRpcException
     */
    public function relayTx(array $txids): RelayTxResponse
    {
        return $this->handleRequest(RelayTxRequest::create($txids), RelayTxResponse::class);
    }

    /**
     * Get synchronisation information
     *
     * @throws MoneroRpcException
     */
    public function syncInfo(): SyncInfoResponse
    {
        return $this->handleRequest(SyncInfoRequest::create(), SyncInfoResponse::class);
    }

    /**
     * Get all transaction pool backlog
     *
     * @throws MoneroRpcException
     */
    public function getTxpoolBacklog(): GetTxpoolBacklogResponse
    {
        return $this->handleRequest(GetTxpoolBacklogRequest::create(), GetTxpoolBacklogResponse::class);
    }

    /**
     * @param int[] $amounts amounts to look for
     * @param bool $cumulative (optional, default is `false`) States if the result should be cumulative (`true`) or not (`false`)
     * @param ?int $fromHeight (optional, default is 0) starting height to check from
     * @param ?int $toHeight (optional, default is 0) ending height to check up to
     * @throws MoneroRpcException
     */
    public function getOutputDistribution(
        array $amounts,
        ?bool $cumulative = null,
        ?int $fromHeight = null,
        ?int $toHeight = null,
    ): GetOutputDistributionResponse {
        return $this->handleRequest(GetOutputDistributionRequest::create($amounts, $cumulative, $fromHeight, $toHeight), GetOutputDistributionResponse::class);
    }

    /**
     * Provide the necessary data to create a custom block template. They are used by p2pool.
     *
     * @throws MoneroRpcException
     */
    public function getMinerData(): GetMinerDataResponse
    {
        return $this->handleRequest(GetMinerDataRequest::create(), GetMinerDataResponse::class);
    }

    /**
     * @param bool $check Optional (`false` by default) - If set to `true` then pruning status is checked instead of initiating pruning.
     * @throws MoneroRpcException
     */
    public function pruneBlockchain(?bool $check = null): PruneBlockchainResponse
    {
        return $this->handleRequest(PruneBlockchainRequest::create($check), PruneBlockchainResponse::class);
    }

    /**
     * Calculate PoW hash for a block candidate.
     *
     * @param int $majorVersion The major version of the monero protocol at this block height.
     * @param int $height
     * @param string $blockBlob
     * @param string $seedHash
     * @throws MoneroRpcException
     */
    public function calcPow(int $majorVersion, int $height, string $blockBlob, string $seedHash): CalcPowResponse
    {
        return $this->handleRequest(CalcPowRequest::create($majorVersion, $height, $blockBlob, $seedHash), CalcPowResponse::class);
    }

    /**
     * Flush bad transactions / blocks from the cache.
     *
     * @param bool $badTxs Optional (`false` by default).
     * @param bool $badBlocks Optional (`false` by default).
     * @throws MoneroRpcException
     */
    public function flushCache(?bool $badTxs = null, ?bool $badBlocks = null): FlushCacheResponse
    {
        return $this->handleRequest(FlushCacheRequest::create($badTxs, $badBlocks), FlushCacheResponse::class);
    }

    /**
     * Easily enable merge mining with Monero without requiring software that manually alters the extra field in the coinbase tx to include the merkle root of the aux blocks.
     *
     * @param string $blocktemplateBlob
     * @param AuxPow[] $auxPow @var AuxPow
     * @throws MoneroRpcException
     */
    public function addAuxPow(string $blocktemplateBlob, array $auxPow): AddAuxPowResponse
    {
        return $this->handleRequest(AddAuxPowRequest::create($blocktemplateBlob, $auxPow), AddAuxPowResponse::class);
    }

    /**
     * For this method to work the daemon has to be running in regtest mode.
     * Generate a block and specify the address to receive the coinbase reward.
     *
     * @param int $amountOfBlocks number of blocks to be generated.
     * @param string $walletAddress address to receive the coinbase reward.
     * @param ?string $prevBlock
     * @param ?int $startingNonce Increased by miner untill it finds a matching result that solves a block.
     * @throws MoneroRpcException
     */
    public function generateBlocks(
        int $amountOfBlocks,
        string $walletAddress,
        ?string $prevBlock = null,
        ?int $startingNonce = null,
    ): GenerateblocksResponse {
        return $this->handleRequest(GenerateblocksRequest::create($amountOfBlocks, $walletAddress, $prevBlock, $startingNonce), GenerateblocksResponse::class);
    }

    // Below this line are the 'other' methods

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
     * Get some networking information from the daemon
     *
     * @throws MoneroRpcException
     */
    public function getNetStats(): GetNetStatsResponse
    {
        $this->endPointPath = '/get_net_stats';
        return $this->handleRequest(GetNetStatsRequest::create(), GetNetStatsResponse::class);
    }

    /**
     * Get the node's current height.
     *
     * @throws MoneroRpcException
     */
    public function getHeight(): GetHeightResponse
    {
        $this->endPointPath = '/get_height';
        return $this->handleRequest(GetHeightRequest::create(), GetHeightResponse::class);
    }

    /**
     * Broadcast a raw transaction to the network.
     *
     * @param string $txAsHex Full transaction information as hexidecimal string.
     * @param ?bool $doNotRelay Stop relaying transaction to other nodes (default is `false`).
     * @throws MoneroRpcException
     */
    public function sendRawTransaction(string $txAsHex, ?bool $doNotRelay = null): SendRawTransactionResponse
    {
        $this->endPointPath = '/send_raw_transaction';
        return $this->handleRequest(SendRawTransactionRequest::create($txAsHex, $doNotRelay), SendRawTransactionResponse::class);
    }

    /**
     * Get the known blocks hashes which are not on the main chain.
     *
     * @throws MoneroRpcException
     */
    public function getAltBlocksHashes(): GetAltBlocksHashesResponse
    {
        $this->endPointPath = '/get_alt_blocks_hashes';
        return $this->handleRequest(GetAltBlocksHashesRequest::create(), GetAltBlocksHashesResponse::class);
    }

    /**
     * Check if outputs have been spent using the key image associated with the output.
     *
     * @param string[] $keyImages List of key image hex strings to check.
     * @throws MoneroRpcException
     */
    public function isKeyImageSpent(array $keyImages): IsKeyImageSpentResponse
    {
        $this->endPointPath = '/is_key_image_spent';
        return $this->handleRequest(IsKeyImageSpentRequest::create($keyImages), IsKeyImageSpentResponse::class);
    }

    /**
     * Start mining on the daemon.
     *
     * @param bool $doBackgroundMining States if the mining should run in background (`true`) or foreground (`false`).
     * @param bool $ignoreBattery States if batery state (on laptop) should be ignored (`true`) or not (`false`).
     * @param string $minerAddress Account address to mine to.
     * @param int $threadsCount Number of mining thread to run.
     * @throws MoneroRpcException
     */
    public function startMining(
        bool $doBackgroundMining,
        bool $ignoreBattery,
        string $minerAddress,
        int $threadsCount,
    ): StartMiningResponse {
        $this->endPointPath = '/start_mining';
        return $this->handleRequest(StartMiningRequest::create($doBackgroundMining, $ignoreBattery, $minerAddress, $threadsCount), StartMiningResponse::class);
    }

    /**
     * Stop mining on the daemon.
     *
     * @throws MoneroRpcException
     */
    public function stopMining(): StopMiningResponse
    {
        $this->endPointPath = '/stop_mining';
        return $this->handleRequest(StopMiningRequest::create(), StopMiningResponse::class);
    }

    /**
     * Get the mining status of the daemon.
     *
     * @throws MoneroRpcException
     */
    public function miningStatus(): MiningStatusResponse
    {
        $this->endPointPath = '/mining_status';
        return $this->handleRequest(MiningStatusRequest::create(), MiningStatusResponse::class);
    }

    /**
     * Save the blockchain. The blockchain does not need saving and is always saved when modified,
     * however it does a sync to flush the filesystem cache onto the disk for safety purposes against Operating System or Hardware crashes.
     *
     * @throws MoneroRpcException
     */
    public function saveBlockchain(): SaveBlockchainResponse
    {
        $this->endPointPath = '/save_bc';
        return $this->handleRequest(SaveBlockchainRequest::create(), SaveBlockchainResponse::class);
    }

    /**
     * Set the log hash rate display mode.
     *
     * @param bool $visible States if hash rate logs should be visible (`true`) or hidden (`false`)
     * @throws MoneroRpcException
     */
    public function setLogHashRate(bool $visible): SetLogHashRateResponse
    {
        $this->endPointPath = '/set_log_hash_rate';
        return $this->handleRequest(SetLogHashRateRequest::create($visible), SetLogHashRateResponse::class);
    }

    /**
     * Set the daemon log level.By default, log level is set to `0`.
     *
     * @param int $level daemon log level to set from `0` (less verbose) to `4` (most verbose)
     * @throws MoneroRpcException
     */
    public function setLogLevel(int $level): SetLogLevelResponse
    {
        $this->endPointPath = '/set_log_level';
        return $this->handleRequest(SetLogLevelRequest::create($level), SetLogLevelResponse::class);
    }

    /**
     * Set the daemon log categories.Categories are represented as a comma separated list of `<Category>:<level>`
     * (similarly to syslog standard `<Facility>:<Severity-level>`)
     *
     * @param ?string $categories Daemon log categories to enable
     * @throws MoneroRpcException
     */
    public function setLogCategories(?string $categories = null): SetLogCategoriesResponse
    {
        $this->endPointPath = '/set_log_categories';
        return $this->handleRequest(SetLogCategoriesRequest::create($categories), SetLogCategoriesResponse::class);
    }

    /**
     * Set daemon bandwidth limits.
     *
     * @param int $limitDown Download limit in kBytes per second (-1 reset to default, 0 don't change the current limit)
     * @param int $limitUp Upload limit in kBytes per second (-1 reset to default, 0 don't change the current limit)
     * @throws MoneroRpcException
     */
    public function setLimit(int $limitDown, int $limitUp): SetLimitResponse
    {
        $this->endPointPath = '/set_limit';
        return $this->handleRequest(SetLimitRequest::create($limitDown, $limitUp), SetLimitResponse::class);
    }

    /**
     * Get daemon bandwidth limits.
     *
     * @throws MoneroRpcException
     */
    public function getLimit(): GetLimitResponse
    {
        $this->endPointPath = '/get_limit';
        return $this->handleRequest(GetLimitRequest::create(), GetLimitResponse::class);
    }

    /**
     * Limit number of Outgoing peers.
     *
     * @param int $outPeers Max number of outgoing peers
     * @throws MoneroRpcException
     */
    public function outPeers(int $outPeers): OutPeersResponse
    {
        $this->endPointPath = '/out_peers';
        return $this->handleRequest(OutPeersRequest::create($outPeers), OutPeersResponse::class);
    }

    /**
     * Limit number of Incoming peers.
     *
     * @param int $inPeers Max number of incoming peers
     * @throws MoneroRpcException
     */
    public function inPeers(int $inPeers): InPeersResponse
    {
        $this->endPointPath = '/in_peers';
        return $this->handleRequest(InPeersRequest::create($inPeers), InPeersResponse::class);
    }

    /**
     * Get the known peers list.
     *
     * @param ?bool $publicOnly Only show public zone peers
     * @param ?bool $includeBlocked Show blocked nodes
     * @throws MoneroRpcException
     */
    public function getPeerList(?bool $publicOnly = null, ?bool $includeBlocked = null): GetPeerListResponse
    {
        $this->endPointPath = '/get_peer_list';
        return $this->handleRequest(GetPeerListRequest::create($publicOnly, $includeBlocked), GetPeerListResponse::class);
    }

    /**
     * Update daemon.
     *
     * @param UpdateCommand $command command to use, either `check` or `download`
     * @param ?string $path Optional, path where to download the update.
     * @throws MoneroRpcException
     */
    public function update(UpdateCommand $command, ?string $path = null): UpdateResponse
    {
        $this->endPointPath = '/update';
        return $this->handleRequest(UpdateRequest::create($command, $path), UpdateResponse::class);
    }

    /**
     * Give immediate usability to wallets while syncing by proxying RPC requests.
     *
     * @param string $address host:port
     * @param ?string $username
     * @param ?string $password
     * @param ?string $proxy
     * @throws MoneroRpcException
     */
    public function setBootstrapDaemon(
        string $address,
        ?string $username = null,
        ?string $password = null,
        ?string $proxy = null,
    ): SetBootstrapDaemonResponse {
        $this->endPointPath = '/set_bootstrap_daemon';
        return $this->handleRequest(SetBootstrapDaemonRequest::create($address, $username, $password, $proxy), SetBootstrapDaemonResponse::class);
    }

    /**
     * Get the transaction pool statistics.
     *
     * @throws MoneroRpcException
     */
    public function getTransactionPoolStats(): GetTransactionPoolStatsResponse
    {
        $this->endPointPath = '/get_transaction_pool_stats';
        return $this->handleRequest(GetTransactionPoolStatsRequest::create(), GetTransactionPoolStatsResponse::class);
    }
}
