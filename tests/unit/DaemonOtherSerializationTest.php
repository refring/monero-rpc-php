<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\unit;

use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\DaemonOther\GetAltBlocksHashesRequest;
use RefRing\MoneroRpcPhp\DaemonOther\GetHeightRequest;
use RefRing\MoneroRpcPhp\DaemonOther\GetLimitRequest;
use RefRing\MoneroRpcPhp\DaemonOther\GetNetStatsRequest;
use RefRing\MoneroRpcPhp\DaemonOther\GetOutsRequest;
use RefRing\MoneroRpcPhp\DaemonOther\GetPeerListRequest;
use RefRing\MoneroRpcPhp\DaemonOther\GetTransactionPoolRequest;
use RefRing\MoneroRpcPhp\DaemonOther\GetTransactionPoolStatsRequest;
use RefRing\MoneroRpcPhp\DaemonOther\GetTransactionsRequest;
use RefRing\MoneroRpcPhp\DaemonOther\InPeersRequest;
use RefRing\MoneroRpcPhp\DaemonOther\IsKeyImageSpentRequest;
use RefRing\MoneroRpcPhp\DaemonOther\MiningStatusRequest;
use RefRing\MoneroRpcPhp\DaemonOther\Model\GetOutputsOut;
use RefRing\MoneroRpcPhp\DaemonOther\OutPeersRequest;
use RefRing\MoneroRpcPhp\DaemonOther\PopBlocksRequest;
use RefRing\MoneroRpcPhp\DaemonOther\SaveBlockchainRequest;
use RefRing\MoneroRpcPhp\DaemonOther\SendRawTransactionRequest;
use RefRing\MoneroRpcPhp\DaemonOther\SetBootstrapDaemonRequest;
use RefRing\MoneroRpcPhp\DaemonOther\SetLimitRequest;
use RefRing\MoneroRpcPhp\DaemonOther\SetLogCategoriesRequest;
use RefRing\MoneroRpcPhp\DaemonOther\SetLogHashRateRequest;
use RefRing\MoneroRpcPhp\DaemonOther\SetLogLevelRequest;
use RefRing\MoneroRpcPhp\DaemonOther\StartMiningRequest;
use RefRing\MoneroRpcPhp\DaemonOther\StopDaemonRequest;
use RefRing\MoneroRpcPhp\DaemonOther\StopMiningRequest;
use RefRing\MoneroRpcPhp\DaemonOther\UpdateRequest;
use RefRing\MoneroRpcPhp\Enum\UpdateCommand;

class DaemonOtherSerializationTest extends TestCase
{
    public function testGetHeight()
    {
        $expected = '';
        $request = GetHeightRequest::create();
        $this->assertSame($expected, $request->toJson());
    }

    public function testGetNetStats()
    {
        $expected = '';
        $request = GetNetStatsRequest::create();
        $this->assertSame($expected, $request->toJson());
    }

    public function testPopBlocks()
    {
        $expected = '{"nblocks":6}';
        $request = PopBlocksRequest::create(6);
        $this->assertSame($expected, $request->toJson());
    }

    public function testSendRawTransaction()
    {
        $expected = '{"tx_as_hex":"de6a3...","do_not_relay":false}';
        $request = SendRawTransactionRequest::create('de6a3...', false);
        $this->assertSame($expected, $request->toJson());
    }

    public function testGetAltBlocksHashes()
    {
        $expected = '';
        $request = GetAltBlocksHashesRequest::create();
        $this->assertSame($expected, $request->toJson());
    }

    public function testIsKeyImageSpent()
    {
        $expected = '{"key_images":["8d1bd8181bf7d857bdb281e0153d84cd55a3fcaa57c3e570f4a49f935850b5e3","7319134bfc50668251f5b899c66b005805ee255c136f0e1cecbb0f3a912e09d4"]}';
        $keyImages = ['8d1bd8181bf7d857bdb281e0153d84cd55a3fcaa57c3e570f4a49f935850b5e3', '7319134bfc50668251f5b899c66b005805ee255c136f0e1cecbb0f3a912e09d4'];
        $request = IsKeyImageSpentRequest::create($keyImages);
        $this->assertSame($expected, $request->toJson());
    }

    public function testStartMining()
    {
        $expected = '{"do_background_mining":false,"ignore_battery":true,"miner_address":"47xu3gQpF569au9C2ajo5SSMrWji6xnoE5vhr94EzFRaKAGw6hEGFXYAwVADKuRpzsjiU1PtmaVgcjUJF89ghGPhUXkndHc","threads_count":1}';
        $minerAddress = '47xu3gQpF569au9C2ajo5SSMrWji6xnoE5vhr94EzFRaKAGw6hEGFXYAwVADKuRpzsjiU1PtmaVgcjUJF89ghGPhUXkndHc';
        $request = StartMiningRequest::create(false, true, $minerAddress, 1);
        $this->assertSame($expected, $request->toJson());
    }

    public function testStopMining()
    {
        $expected = '';
        $request = StopMiningRequest::create();
        $this->assertSame($expected, $request->toJson());
    }

    public function testMiningStatus()
    {
        $expected = '';
        $request = MiningStatusRequest::create();
        $this->assertSame($expected, $request->toJson());
    }

    public function testSaveBlockchain()
    {
        $expected = '';
        $request = SaveBlockchainRequest::create();
        $this->assertSame($expected, $request->toJson());
    }

    public function testSetLogHashRate()
    {
        $expected = '{"visible":true}';
        $request = SetLogHashRateRequest::create(true);
        $this->assertSame($expected, $request->toJson());
    }

    public function testSetLogLevel()
    {
        $expected = '{"level":1}';
        $request = SetLogLevelRequest::create(1);
        $this->assertSame($expected, $request->toJson());
    }

    public function testSetLogCategories()
    {
        $expected = '{"categories":"*:INFO"}';
        $request = SetLogCategoriesRequest::create("*:INFO");
        $this->assertSame($expected, $request->toJson());
    }

    public function testSetLimit()
    {
        $expected = '{"limit_down":1024}';
        $request = SetLimitRequest::create(1024);
        $this->assertSame($expected, $request->toJson());
    }

    public function testGetLimit()
    {
        $expected = '';
        $request = GetLimitRequest::create();
        $this->assertSame($expected, $request->toJson());
    }

    public function testOutPeers()
    {
        $expected = '{"out_peers":3232235535}';
        $request = OutPeersRequest::create(3232235535);
        $this->assertSame($expected, $request->toJson());
    }

    public function testInPeers()
    {
        $expected = '{"in_peers":3232235535}';
        $request = InPeersRequest::create(3232235535);
        $this->assertSame($expected, $request->toJson());
    }

    public function testGetPeerList()
    {
        $expected = '';
        $request = GetPeerListRequest::create();
        $this->assertSame($expected, $request->toJson());

        $expected = '{"public_only":false,"include_blocked":true}';
        $request = GetPeerListRequest::create(false, true);
        $this->assertSame($expected, $request->toJson());
    }

    public function testUpdate()
    {
        $expected = '{"command":"check"}';
        $request = UpdateRequest::create(UpdateCommand::CHECK);
        $this->assertSame($expected, $request->toJson());

        $expected = '{"command":"download","path":"path"}';
        $request = UpdateRequest::create(UpdateCommand::DOWNLOAD, 'path');
        $this->assertSame($expected, $request->toJson());
    }

    public function testSetBootstrapDaemon()
    {
        $expected = '{"address":"http:\/\/getmonero.org:18081"}';
        $request = SetBootstrapDaemonRequest::create('http://getmonero.org:18081');
        $this->assertSame($expected, $request->toJson());

        $expected = '{"address":"http:\/\/getmonero.org:18081","username":"foo","password":"bar"}';
        $request = SetBootstrapDaemonRequest::create('http://getmonero.org:18081', 'foo', 'bar');
        $this->assertSame($expected, $request->toJson());
    }

    public function testGetOuts()
    {
        $expected = '{"outputs":[{"amount":0,"index":58246335}],"get_txid":true}';
        $request = GetOutsRequest::create([new GetOutputsOut(0, 58246335)], true);
        $this->assertSame($expected, $request->toJson());
    }

    public function testGetTransactionPoolStats()
    {
        $expected = '';
        $request = GetTransactionPoolStatsRequest::create();
        $this->assertSame($expected, $request->toJson());
    }

    public function testGetTransactions()
    {
        $expected = '{"txs_hashes":["d6e48158472848e6687173a91ae6eebfa3e1d778e65252ee99d7515d63090408"],"decode_as_json":true}';
        $request = GetTransactionsRequest::create(['d6e48158472848e6687173a91ae6eebfa3e1d778e65252ee99d7515d63090408']);
        $this->assertSame($expected, $request->toJson());
    }

    public function testStopDaemon()
    {
        $expected = '';
        $request = StopDaemonRequest::create();
        $this->assertSame($expected, $request->toJson());
    }

    public function testGetTransactionPool()
    {
        $expected = '';
        $request = GetTransactionPoolRequest::create();
        $this->assertSame($expected, $request->toJson());
    }
}
