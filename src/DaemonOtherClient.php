<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp;

use RefRing\MoneroRpcPhp\DaemonOther\PopBlocksRequest;
use RefRing\MoneroRpcPhp\DaemonOther\PopBlocksResponse;
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
use RefRing\MoneroRpcPhp\DaemonRpc\GetLastBlockHeaderBaseResponse;
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
use RefRing\MoneroRpcPhp\Exception\BlockNotAcceptedException;
use RefRing\MoneroRpcPhp\Exception\InvalidBlockHeightException;
use RefRing\MoneroRpcPhp\Exception\InvalidBlockTemplateBlobException;
use RefRing\MoneroRpcPhp\Exception\MoneroRpcException;
use RefRing\MoneroRpcPhp\Model\AuxPow;
use RefRing\MoneroRpcPhp\Model\BlockHash;
use RefRing\MoneroRpcPhp\Model\BlockHeight;
use RefRing\MoneroRpcPhp\Model\Node;

class DaemonOtherClient extends JsonRpcClient
{
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
}
