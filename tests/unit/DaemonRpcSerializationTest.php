<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\unit;

use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\DaemonRpc\BannedRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\CalcPowRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\FlushCacheRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\FlushTxpoolRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GenerateblocksRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetAlternateChainsRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBansRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockCountRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockHeaderByHashRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockHeaderByHeightRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockHeadersRangeRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockTemplateRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetCoinbaseTxSumRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetConnectionsRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetFeeEstimateRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetInfoRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetLastBlockHeaderRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetMinerDataRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetOutputDistributionRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetOutputHistogramRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetTxpoolBacklogRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\GetVersionRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\HardForkInfoRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\OnGetBlockHashRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\PruneBlockchainRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\RelayTxRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\SetBansRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\SubmitBlockRequest;
use RefRing\MoneroRpcPhp\DaemonRpc\SyncInfoRequest;
use RefRing\MoneroRpcPhp\Model\BlockHash;
use RefRing\MoneroRpcPhp\Model\BlockHeight;
use RefRing\MoneroRpcPhp\Model\Node;

class DaemonRpcSerializationTest extends TestCase
{
    public function testGetBlockCount()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_block_count"}';
        $request = GetBlockCountRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testOnGetBlockHash()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"on_get_block_hash","params":[912345]}';
        $values = 912345;
        $request = OnGetBlockHashRequest::create($values);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetBlockTemplate()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_block_template","params":{"wallet_address":"44GBHzv6ZyQdJkjqZje6KLZ3xSyN1hBSFAnLP6EAqJtCRVzMzZmeXTC2AHKDS9aEDTRKmo6a6o9r9j86pYfhCWDkKjbtcns","reserve_size":60}}';
        $walletAddress = '44GBHzv6ZyQdJkjqZje6KLZ3xSyN1hBSFAnLP6EAqJtCRVzMzZmeXTC2AHKDS9aEDTRKmo6a6o9r9j86pYfhCWDkKjbtcns';
        $reserveSize = 60;
        $request = GetBlockTemplateRequest::create($walletAddress, $reserveSize);
        $this->assertSame($expected, $request->toJson());
    }


    public function testSubmitBlock()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"submit_block","params":["0707e6bdfedc053771512f1bc27c62731ae9e8f2443db64ce742f4e57f5cf8d393de28551e441a0000000002fb830a01ffbf830a018cfe88bee283060274c0aae2ef5730e680308d9c00b6da59187ad0352efe3c71d36eeeb28782f29f2501bd56b952c3ddc3e350c2631d3a5086cac172c56893831228b17de296ff4669de020200000000"]}';
        $values = ["0707e6bdfedc053771512f1bc27c62731ae9e8f2443db64ce742f4e57f5cf8d393de28551e441a0000000002fb830a01ffbf830a018cfe88bee283060274c0aae2ef5730e680308d9c00b6da59187ad0352efe3c71d36eeeb28782f29f2501bd56b952c3ddc3e350c2631d3a5086cac172c56893831228b17de296ff4669de020200000000"];
        $request = SubmitBlockRequest::create($values);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGenerateblocks()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"generateblocks","params":{"amount_of_blocks":1,"wallet_address":"44AFFq5kSiGBoZ4NMDwYtN18obc8AemS33DBLWs3H7otXft3XjrpDtQGv7SqSsaBYBb98uNbr2VBBEt7f2wfn3RVGQBEP3A","starting_nonce":0}}';
        $amountOfBlocks = 1;
        $walletAddress = '44AFFq5kSiGBoZ4NMDwYtN18obc8AemS33DBLWs3H7otXft3XjrpDtQGv7SqSsaBYBb98uNbr2VBBEt7f2wfn3RVGQBEP3A';
        $startingNonce = 0;

        $request = GenerateblocksRequest::create($amountOfBlocks, $walletAddress, null, $startingNonce);
        $this->assertSame($expected, $request->toJson());
    }

    public function testGetLastBlockHeader()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_last_block_header"}';
        $request = GetLastBlockHeaderRequest::create(null);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetBlockHeaderByHash()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_block_header_by_hash","params":{"hash":"e22cf75f39ae720e8b71b3d120a5ac03f0db50bba6379e2850975b4859190bc6"}}';
        $hash = 'e22cf75f39ae720e8b71b3d120a5ac03f0db50bba6379e2850975b4859190bc6';
        $request = GetBlockHeaderByHashRequest::create($hash);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetBlockHeaderByHeight()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_block_header_by_height","params":{"height":912345}}';
        $height = 912345;
        $request = GetBlockHeaderByHeightRequest::create($height);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetBlockHeadersRange()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_block_headers_range","params":{"start_height":1545999,"end_height":1546000}}';
        $startHeight = 1545999;
        $endHeight = 1546000;
        $request = GetBlockHeadersRangeRequest::create($startHeight, $endHeight);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetBlockWithHeight()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_block","params":{"height":2751506}}';
        $request = GetBlockRequest::create(new BlockHeight(2751506));
        $this->assertSame($expected, $request->toJson());
    }

    public function testGetBlockWithHash()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_block","params":{"hash":"dd4998cfe92a959a5a0e4ed72432cf23d7dfc4179cbea871ee2a705d71fb5e25"}}';
        $request = GetBlockRequest::create(new BlockHash('dd4998cfe92a959a5a0e4ed72432cf23d7dfc4179cbea871ee2a705d71fb5e25'));
        $this->assertSame($expected, $request->toJson());
    }

    public function testGetConnections()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_connections"}';
        $request = GetConnectionsRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetInfo()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_info"}';
        $request = GetInfoRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testHardForkInfo()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"hard_fork_info"}';
        $request = HardForkInfoRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testSetBans()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"set_bans","params":{"bans":[{"host":"192.168.1.51","ban":true,"seconds":30}]}}';

        $node = new Node('192.168.1.51', 0, true, 30);

        $request = SetBansRequest::create([$node]);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetBans()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_bans"}';
        $request = GetBansRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testBanned()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"banned","params":{"address":"95.216.203.255"}}';
        $request = BannedRequest::create('95.216.203.255');
        $this->assertSame($expected, $request->toJson());
    }


    public function testFlushTxpool()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"flush_txpool","params":{"txids":["dc16fa8eaffe1484ca9014ea050e13131d3acf23b419f33bb4cc0b32b6c49308",""]}}';
        $request = FlushTxpoolRequest::create(['dc16fa8eaffe1484ca9014ea050e13131d3acf23b419f33bb4cc0b32b6c49308', '']);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetOutputHistogram()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_output_histogram","params":{"amounts":[20000000000]}}';
        $request = GetOutputHistogramRequest::create([20000000000]);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetCoinbaseTxSum()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_coinbase_tx_sum","params":{"height":1563078,"count":2}}';
        $height = 1563078;
        $count = 2;
        $request = GetCoinbaseTxSumRequest::create($height, $count);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetVersion()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_version"}';
        $request = GetVersionRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetFeeEstimate()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_fee_estimate"}';
        $request = GetFeeEstimateRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetAlternateChains()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_alternate_chains"}';
        $request = GetAlternateChainsRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testRelayTx()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"relay_tx","params":{"txids":["9fd75c429cbe52da9a52f2ffc5fbd107fe7fd2099c0d8de274dc8a67e0c98613"]}}';
        $request = RelayTxRequest::create(['9fd75c429cbe52da9a52f2ffc5fbd107fe7fd2099c0d8de274dc8a67e0c98613']);
        $this->assertSame($expected, $request->toJson());
    }


    public function testSyncInfo()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"sync_info"}';
        $request = SyncInfoRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetTxpoolBacklog()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_txpool_backlog"}';
        $request = GetTxpoolBacklogRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetOutputDistribution()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_output_distribution","params":{"amounts":[628780000],"from_height":1462078}}';
        $request = GetOutputDistributionRequest::create([628780000], null, 1462078);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetMinerData()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_miner_data"}';
        $request = GetMinerDataRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testPruneBlockchain()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"prune_blockchain","params":{"check":true}}';
        $request = PruneBlockchainRequest::create(true);
        $this->assertSame($expected, $request->toJson());
    }


    public function testCalcPow()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"calc_pow","params":{"major_version":14,"height":2286447,"block_blob":"0e0ed286da8006ecdc1aab3033cf1716c52f13f9d8ae0051615a2453643de94643b550d543becd0000000002abc78b0101ffefc68b0101fcfcf0d4b422025014bb4a1eade6622fd781cb1063381cad396efa69719b41aa28b4fce8c7ad4b5f019ce1dc670456b24a5e03c2d9058a2df10fec779e2579753b1847b74ee644f16b023c00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000051399a1bc46a846474f5b33db24eae173a26393b976054ee14f9feefe99925233802867097564c9db7a36af5bb5ed33ab46e63092bd8d32cef121608c3258edd55562812e21cc7e3ac73045745a72f7d74581d9a0849d6f30e8b2923171253e864f4e9ddea3acb5bc755f1c4a878130a70c26297540bc0b7a57affb6b35c1f03d8dbd54ece8457531f8cba15bb74516779c01193e212050423020e45aa2c15dcb","seed_hash":"d432f499205150873b2572b5f033c9c6e4b7c6f3394bd2dd93822cd7085e7307"}}';
        $request = CalcPowRequest::create(14, 2286447, '0e0ed286da8006ecdc1aab3033cf1716c52f13f9d8ae0051615a2453643de94643b550d543becd0000000002abc78b0101ffefc68b0101fcfcf0d4b422025014bb4a1eade6622fd781cb1063381cad396efa69719b41aa28b4fce8c7ad4b5f019ce1dc670456b24a5e03c2d9058a2df10fec779e2579753b1847b74ee644f16b023c00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000051399a1bc46a846474f5b33db24eae173a26393b976054ee14f9feefe99925233802867097564c9db7a36af5bb5ed33ab46e63092bd8d32cef121608c3258edd55562812e21cc7e3ac73045745a72f7d74581d9a0849d6f30e8b2923171253e864f4e9ddea3acb5bc755f1c4a878130a70c26297540bc0b7a57affb6b35c1f03d8dbd54ece8457531f8cba15bb74516779c01193e212050423020e45aa2c15dcb', 'd432f499205150873b2572b5f033c9c6e4b7c6f3394bd2dd93822cd7085e7307');
        $this->assertSame($expected, $request->toJson());
    }


    public function testFlushCache()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"flush_cache","params":{"bad_txs":true,"bad_blocks":true}}';
        $request = FlushCacheRequest::create(true, true);
        $this->assertSame($expected, $request->toJson());
    }
}
