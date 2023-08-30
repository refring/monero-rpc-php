<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp;

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

class DaemonRpcClient extends JsonRpcClient
{
    public function getBlockCount(): GetBlockCountResponse
    {
        return $this->handleRequest(GetBlockCountRequest::create(), GetBlockCountResponse::class);
    }


    public function onGetBlockHash(array $values): OnGetBlockHashResponse
    {
        return $this->handleRequest(OnGetBlockHashRequest::create($values), OnGetBlockHashResponse::class);
    }


    public function getBlockTemplate(string $walletAddress, int $reserveSize): GetBlockTemplateResponse
    {
        return $this->handleRequest(GetBlockTemplateRequest::create($walletAddress, $reserveSize), GetBlockTemplateResponse::class);
    }


    public function submitBlock(array $values): SubmitBlockResponse
    {
        return $this->handleRequest(SubmitBlockRequest::create($values), SubmitBlockResponse::class);
    }

    public function getLastBlockHeader(bool $fillPowHash = null): GetLastBlockHeaderResponse
    {
        return $this->handleRequest(GetLastBlockHeaderRequest::create($fillPowHash), GetLastBlockHeaderResponse::class);
    }


    public function getBlockHeaderByHash(string $hash, bool $fillPowHash = null): GetBlockHeaderByHashResponse
    {
        return $this->handleRequest(GetBlockHeaderByHashRequest::create($hash, $fillPowHash), GetBlockHeaderByHashResponse::class);
    }


    public function getBlockHeaderByHeight(int $height, bool $fillPowHash = null): GetBlockHeaderByHeightResponse
    {
        return $this->handleRequest(GetBlockHeaderByHeightRequest::create($height, $fillPowHash), GetBlockHeaderByHeightResponse::class);
    }


    public function getBlockHeadersRange(
        int $startHeight,
        int $endHeight,
        bool $fillPowHash = null,
    ): GetBlockHeadersRangeResponse {
        return $this->handleRequest(GetBlockHeadersRangeRequest::create($startHeight, $endHeight, $fillPowHash), GetBlockHeadersRangeResponse::class);
    }


    public function getBlock(int $height, string $hash, bool $fillPowHash = null): GetBlockResponse
    {
        return $this->handleRequest(GetBlockRequest::create($height, $hash, $fillPowHash), GetBlockResponse::class);
    }


    public function getConnections(): GetConnectionsResponse
    {
        return $this->handleRequest(GetConnectionsRequest::create(), GetConnectionsResponse::class);
    }


    public function getInfo(): GetInfoResponse
    {
        return $this->handleRequest(GetInfoRequest::create(), GetInfoResponse::class);
    }


    public function hardForkInfo(): HardForkInfoResponse
    {
        return $this->handleRequest(HardForkInfoRequest::create(), HardForkInfoResponse::class);
    }


    public function setBans(array $bans): SetBansResponse
    {
        return $this->handleRequest(SetBansRequest::create($bans), SetBansResponse::class);
    }


    public function getBans(): GetBansResponse
    {
        return $this->handleRequest(GetBansRequest::create(), GetBansResponse::class);
    }


    public function banned(string $address): BannedResponse
    {
        return $this->handleRequest(BannedRequest::create($address), BannedResponse::class);
    }


    public function flushTxpool(array $txids = null): FlushTxpoolResponse
    {
        return $this->handleRequest(FlushTxpoolRequest::create($txids), FlushTxpoolResponse::class);
    }


    public function getOutputHistogram(
        array $amounts,
        int $minCount = null,
        int $maxCount = null,
        bool $unlocked = null,
        int $recentCutoff = null,
    ): GetOutputHistogramResponse {
        return $this->handleRequest(GetOutputHistogramRequest::create($amounts, $minCount, $maxCount, $unlocked, $recentCutoff), GetOutputHistogramResponse::class);
    }


    public function getCoinbaseTxSum(int $height, int $count): GetCoinbaseTxSumResponse
    {
        return $this->handleRequest(GetCoinbaseTxSumRequest::create($height, $count), GetCoinbaseTxSumResponse::class);
    }


    public function getVersion(): GetVersionResponse
    {
        return $this->handleRequest(GetVersionRequest::create(), GetVersionResponse::class);
    }


    public function getFeeEstimate(int $graceBlocks = null): GetFeeEstimateResponse
    {
        return $this->handleRequest(GetFeeEstimateRequest::create($graceBlocks), GetFeeEstimateResponse::class);
    }


    public function getAlternateChains(): GetAlternateChainsResponse
    {
        return $this->handleRequest(GetAlternateChainsRequest::create(), GetAlternateChainsResponse::class);
    }


    public function relayTx(array $txids): RelayTxResponse
    {
        return $this->handleRequest(RelayTxRequest::create($txids), RelayTxResponse::class);
    }


    public function syncInfo(): SyncInfoResponse
    {
        return $this->handleRequest(SyncInfoRequest::create(), SyncInfoResponse::class);
    }


    public function getTxpoolBacklog(): GetTxpoolBacklogResponse
    {
        return $this->handleRequest(GetTxpoolBacklogRequest::create(), GetTxpoolBacklogResponse::class);
    }


    public function getOutputDistribution(
        array $amounts,
        bool $cumulative = null,
        int $fromHeight = null,
        int $toHeight = null,
    ): GetOutputDistributionResponse {
        return $this->handleRequest(GetOutputDistributionRequest::create($amounts, $cumulative, $fromHeight, $toHeight), GetOutputDistributionResponse::class);
    }


    public function getMinerData(): GetMinerDataResponse
    {
        return $this->handleRequest(GetMinerDataRequest::create(), GetMinerDataResponse::class);
    }


    public function pruneBlockchain(bool $check = null): PruneBlockchainResponse
    {
        return $this->handleRequest(PruneBlockchainRequest::create($check), PruneBlockchainResponse::class);
    }


    public function calcPow(int $majorVersion, int $height, string $blockBlob, string $seedHash): CalcPowResponse
    {
        return $this->handleRequest(CalcPowRequest::create($majorVersion, $height, $blockBlob, $seedHash), CalcPowResponse::class);
    }


    public function flushCache(bool $badTxs = null, bool $badBlocks = null): FlushCacheResponse
    {
        return $this->handleRequest(FlushCacheRequest::create($badTxs, $badBlocks), FlushCacheResponse::class);
    }


    public function addAuxPow(string $blocktemplateBlob, array $auxPow): AddAuxPowResponse
    {
        return $this->handleRequest(AddAuxPowRequest::create($blocktemplateBlob, $auxPow), AddAuxPowResponse::class);
    }
}
