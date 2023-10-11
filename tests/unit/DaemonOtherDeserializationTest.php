<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\unit;

use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\DaemonOther\GetAltBlocksHashesResponse;
use RefRing\MoneroRpcPhp\DaemonOther\GetHeightResponse;
use RefRing\MoneroRpcPhp\DaemonOther\GetLimitResponse;
use RefRing\MoneroRpcPhp\DaemonOther\GetNetStatsResponse;
use RefRing\MoneroRpcPhp\DaemonOther\GetOutsResponse;
use RefRing\MoneroRpcPhp\DaemonOther\GetPeerListResponse;
use RefRing\MoneroRpcPhp\DaemonOther\GetTransactionPoolStatsResponse;
use RefRing\MoneroRpcPhp\DaemonOther\GetTransactionsResponse;
use RefRing\MoneroRpcPhp\DaemonOther\InPeersResponse;
use RefRing\MoneroRpcPhp\DaemonOther\IsKeyImageSpentResponse;
use RefRing\MoneroRpcPhp\DaemonOther\MiningStatusResponse;
use RefRing\MoneroRpcPhp\DaemonOther\OutPeersResponse;
use RefRing\MoneroRpcPhp\DaemonOther\PopBlocksResponse;
use RefRing\MoneroRpcPhp\DaemonOther\SaveBlockchainResponse;
use RefRing\MoneroRpcPhp\DaemonOther\SendRawTransactionResponse;
use RefRing\MoneroRpcPhp\DaemonOther\SetBootstrapDaemonResponse;
use RefRing\MoneroRpcPhp\DaemonOther\SetLimitResponse;
use RefRing\MoneroRpcPhp\DaemonOther\SetLogCategoriesResponse;
use RefRing\MoneroRpcPhp\DaemonOther\SetLogHashRateResponse;
use RefRing\MoneroRpcPhp\DaemonOther\SetLogLevelResponse;
use RefRing\MoneroRpcPhp\DaemonOther\StartMiningResponse;
use RefRing\MoneroRpcPhp\DaemonOther\StopDaemonResponse;
use RefRing\MoneroRpcPhp\DaemonOther\StopMiningResponse;
use RefRing\MoneroRpcPhp\DaemonOther\UpdateResponse;
use RefRing\MoneroRpcPhp\Model\Output;
use RefRing\MoneroRpcPhp\Model\Transaction;
use RefRing\MoneroRpcPhp\Monero\Amount;

class DaemonOtherDeserializationTest extends TestCase
{
    public function testGetHeight()
    {
        $jsonResponse = '{"hash":"7e23a28cfa6df925d5b63940baf60b83c0cbb65da95f49b19e7cf0ce7dd709ce","height":2287217,"status":"OK","untrusted":false}';
        $response = GetHeightResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testGetNetStats()
    {
        $jsonResponse = '{"start_time":1665147355,"total_packets_in":2130592,"total_bytes_in":3743474809,"total_packets_out":1010674,"total_bytes_out":5932012405,"status":"OK","untrusted":false}';
        $response = GetNetStatsResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testPopBlocks()
    {
        $jsonResponse = '{"height":76482,"status":"OK","untrusted":false}';
        $response = PopBlocksResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testSendRawTransaction()
    {
        $jsonResponse = '{"double_spend":false,"fee_too_low":false,"invalid_input":false,"invalid_output":false,"low_mixin":false,"not_relayed":false,"overspend":false,"reason":"","sanity_check_failed":false,"too_big":false,"too_few_outputs":false,"tx_extra_too_big":false,"credits":0,"top_hash":"","status":"OK","untrusted":false}';
        $response = SendRawTransactionResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testGetAltBlocksHashes()
    {
        $jsonResponse = '{"blks_hashes":["dd4998cfe92a959a5a0e4ed72432cf23d7dfc4179cbea871ee2a705d71fb5e25","f36c3856ffde6a7d06fc832c80ede4ad5b6c8f702c9736dae1e2140d86504db9","8d0c1f806817259d213c8829ea3356334e0d8fdd3b118e1243756e12dce767bb"],"credits":0,"top_hash":"","status":"OK","untrusted":false}';
        $response = GetAltBlocksHashesResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testIsKeyImageSpent()
    {
        $jsonResponse = '{"spent_status":[1,1],"credits":0,"top_hash":"","status":"OK","untrusted":false}';
        $response = IsKeyImageSpentResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testStartMining()
    {
        $jsonResponse = '{"status":"OK","untrusted":false}';
        $response = StartMiningResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testStopMining()
    {
        $jsonResponse = '{"status":"OK","untrusted":false}';
        $response = StopMiningResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testMiningStatus()
    {
        $jsonResponse = '{"active":false,"address":"","bg_idle_threshold":0,"bg_ignore_battery":false,"bg_min_idle_seconds":0,"bg_target":0,"block_reward":0,"block_target":120,"difficulty":239928394679,"difficulty_top64":0,"is_background_mining_enabled":false,"pow_algorithm":"RandomX","speed":0,"threads_count":0,"wide_difficulty":"0x37dcd8c3b7","status":"OK","untrusted":false}';
        $response = MiningStatusResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());

        // When mining
        $jsonResponse = '{"active":true,"address":"47xu3gQpF569au9C2ajo5SSMrWji6xnoE5vhr94EzFRaKAGw6hEGFXYAwVADKuRpzsjiU1PtmaVgcjUJF89ghGPhUXkndHc","bg_idle_threshold":0,"bg_ignore_battery":false,"bg_min_idle_seconds":0,"bg_target":0,"block_reward":1181637918707,"block_target":120,"difficulty":239928394679,"difficulty_top64":0,"is_background_mining_enabled":false,"pow_algorithm":"RandomX","speed":23,"threads_count":1,"wide_difficulty":"0x37dcd8c3b7","status":"OK","untrusted":false}';
        $response = MiningStatusResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testSaveBlockchain()
    {
        $jsonResponse = '{"status":"OK","untrusted":false}';
        $response = SaveBlockchainResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testSetLogHashRate()
    {
        $jsonResponse = '{"status":"OK","untrusted":false}';
        $response = SetLogHashRateResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testSetLogLevel()
    {
        $jsonResponse = '{"status":"OK","untrusted":false}';
        $response = SetLogLevelResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testSetLogCategories()
    {
        $jsonResponse = '{"categories":"*:INFO","status":"OK","untrusted":false}';
        $response = SetLogCategoriesResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testSetLimit()
    {
        $jsonResponse = '{"limit_down":1024,"limit_up":128,"status":"OK","untrusted":false}';
        $response = SetLimitResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testGetLimit()
    {
        $jsonResponse = '{"limit_down":8192,"limit_up":128,"status":"OK","untrusted":false}';
        $response = GetLimitResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testOutPeers()
    {
        $jsonResponse = '{"out_peers":3232235535,"status":"OK","untrusted":false}';
        $response = OutPeersResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testInPeers()
    {
        $jsonResponse = '{"in_peers":3232235535,"status":"OK","untrusted":false}';
        $response = InPeersResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testGetPeerList()
    {
        $jsonResponse = '{"gray_list":[{"host":"192.168.1.1","id":17665230065909172000,"ip":99,"last_seen":1696410658,"port":18080}],"white_list":[{"host":"192.168.1.2","id":16359908073923625000,"ip":100,"last_seen":1696394328,"port":18080,"pruning_seed":388,"rpc_port":18089},{"host":"192.168.1.3","id":6115959747526569000,"ip":101,"last_seen":1696407082,"port":18080,"rpc_credits_per_hash":4194304,"rpc_port":18089}]}';
        $response = GetPeerListResponse::fromJsonString($jsonResponse, flags: JSON_BIGINT_AS_STRING);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testUpdate()
    {
        $jsonResponse = '{"auto_uri":"","hash":"","path":"","update":false,"user_uri":"","version":"","status":"OK","untrusted":false}';
        $response = UpdateResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testSetBootstrapDaemon()
    {
        $jsonResponse = '{"status":"OK"}';
        $response = SetBootstrapDaemonResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testGetTransactionPoolStats()
    {
        $jsonResponse = '{"pool_stats":{"bytes_max":4481,"bytes_med":2215,"bytes_min":1530,"bytes_total":61659,"fee_total":1658860000,"histo":[{"txs":5,"bytes":12670},{"txs":0,"bytes":0},{"txs":1,"bytes":1534},{"txs":1,"bytes":1534},{"txs":3,"bytes":5289}],"histo_98pc":0,"num_10m":0,"num_double_spends":0,"num_failing":0,"num_not_relayed":0,"oldest":1696764439,"txs_total":28},"credits":0,"top_hash":"","status":"OK","untrusted":false}';
        $response = GetTransactionPoolStatsResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testGetOuts()
    {
        $jsonResponse = '{"outs":[{"height":2676286,"key":"f901129b1f78e5e69290cb4ad1f279b4b4a8044bbc2d205816ce7bb6e0d1c3ca","mask":"df1c18803ec819e32726cc2c3e779dc637d48c204b9750050c15711edd4f7dc0","txid":"281f6ccbf3026c2b9a9346677cdd5547c5a414a24c48735ccfb1c4d05f04a555","unlocked":true}],"credits":0,"top_hash":"","status":"OK","untrusted":false}';
        $response = GetOutsResponse::fromJsonString($jsonResponse);
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testTransactionOutput()
    {
        $jsonResponse = '{"amount":0,"target":{"tagged_key":{"key":"19b2a0cbc6388ca0d8ff02fc041e14082ebb1a36441c7413861da9c7456c289f","view_tag":"14"}}}';
        $response = Output::fromJsonString($jsonResponse);
        $this->assertSame(0, (int) $response->amount->getAmount());
        $this->assertSame('19b2a0cbc6388ca0d8ff02fc041e14082ebb1a36441c7413861da9c7456c289f', $response->key);
        $this->assertSame('14', $response->viewTag);

        $jsonResponse = '{"amount":9000000,"target":{"key":"f9c7cf807ae74e56f4ec84db2bd93cfb02c2249b38e306f5b54b6e05d00d543b"}}';
        $response = Output::fromJsonString($jsonResponse);
        $this->assertSame(9000000, (int) $response->amount->getAmount());
        $this->assertSame('f9c7cf807ae74e56f4ec84db2bd93cfb02c2249b38e306f5b54b6e05d00d543b', $response->key);
    }

    public function testTransactionHf1()
    {
        $jsonResponse = '{"credits":0,"status":"OK","top_hash":"","txs":[{"as_hex":"0100010280e08d84ddcb0106010401110701f254220bb50d901a5523eaed438af5d43f8c6d0e54ba0632eb539884f6b7c02008c0a8a50402f9c7cf807ae74e56f4ec84db2bd93cfb02c2249b38e306f5b54b6e05d00d543b8095f52a02b6abb84e00f47f0a72e37b6b29392d906a38468404c57db3dbc5e8dd306a27a880d293ad0302cfc40a86723e7d459e90e45d47818dc0e81a1f451ace5137a4af8110a89a35ea80b4c4c321026b19c796338607d5a2c1ba240a167134142d72d1640ef07902da64fed0b10cfc8088aca3cf02021f6f655254fee84161118b32e7b6f8c31de5eb88aa00c29a8f57c0d1f95a24dd80d0b8e1981a023321af593163cea2ae37168ab926efd87f195756e3b723e886bdb7e618f751c480a094a58d1d0295ed2b08d1cf44482ae0060a5dcc4b7d810a85dea8c62e274f73862f3d59f8ed80a0e5b9c2910102dc50f2f28d7ceecd9a1147f7106c8d5b4e08b2ec77150f52dd7130ee4f5f50d42101d34f90ac861d0ee9fe3891656a234ea86a8a93bf51a237db65baa00d3f4aa196a9e1d89bc06b40e94ea9a26059efc7ba5b2de7ef7c139831ca62f3fe0bb252008f8c7ee810d3e1e06313edf2db362fc39431755779466b635f12f9f32e44470a3e85e08a28fcd90633efc94aa4ae39153dfaf661089d045521343a3d63e8da08d7916753c66aaebd4eefcfe8e58e5b3d266b752c9ca110749fa33fce7c44270386fcf2bed4f03dd5dadb2dc1fd4c505419f8217b9eaec07521f0d8963e104603c926745039cf38d31de6ed95ace8e8a451f5a36f818c151f517546d55ac0f500e54d07b30ea7452f2e93fa4f60bdb30d71a0a97f97eb121e662006780fbf69002228224a96bff37893d47ec3707b17383906c0cd7d9e7412b3e6c8ccf1419b093c06c26f96e3453b424713cdc5c9575f81cda4e157052df11f4c40809edf420f88a3dd1f7909bbf77c8b184a933389094a88e480e900bcdbf6d1824742ee520fc0032e7d892a2b099b8c6edfd1123ce58a34458ee20cad676a7f7cfd80a28f0cb0888af88838310db372986bdcf9bfcae2324480ca7360d22bff21fb569a530e","as_json":"{\n  \"version\": 1, \n  \"unlock_time\": 0, \n  \"vin\": [ {\n      \"key\": {\n        \"amount\": 7000000000000, \n        \"key_offsets\": [ 1, 4, 1, 17, 7, 1\n        ], \n        \"k_image\": \"f254220bb50d901a5523eaed438af5d43f8c6d0e54ba0632eb539884f6b7c020\"\n      }\n    }\n  ], \n  \"vout\": [ {\n      \"amount\": 9000000, \n      \"target\": {\n        \"key\": \"f9c7cf807ae74e56f4ec84db2bd93cfb02c2249b38e306f5b54b6e05d00d543b\"\n      }\n    }, {\n      \"amount\": 90000000, \n      \"target\": {\n        \"key\": \"b6abb84e00f47f0a72e37b6b29392d906a38468404c57db3dbc5e8dd306a27a8\"\n      }\n    }, {\n      \"amount\": 900000000, \n      \"target\": {\n        \"key\": \"cfc40a86723e7d459e90e45d47818dc0e81a1f451ace5137a4af8110a89a35ea\"\n      }\n    }, {\n      \"amount\": 9000000000, \n      \"target\": {\n        \"key\": \"6b19c796338607d5a2c1ba240a167134142d72d1640ef07902da64fed0b10cfc\"\n      }\n    }, {\n      \"amount\": 90000000000, \n      \"target\": {\n        \"key\": \"1f6f655254fee84161118b32e7b6f8c31de5eb88aa00c29a8f57c0d1f95a24dd\"\n      }\n    }, {\n      \"amount\": 900000000000, \n      \"target\": {\n        \"key\": \"3321af593163cea2ae37168ab926efd87f195756e3b723e886bdb7e618f751c4\"\n      }\n    }, {\n      \"amount\": 1000000000000, \n      \"target\": {\n        \"key\": \"95ed2b08d1cf44482ae0060a5dcc4b7d810a85dea8c62e274f73862f3d59f8ed\"\n      }\n    }, {\n      \"amount\": 5000000000000, \n      \"target\": {\n        \"key\": \"dc50f2f28d7ceecd9a1147f7106c8d5b4e08b2ec77150f52dd7130ee4f5f50d4\"\n      }\n    }\n  ], \n  \"extra\": [ 1, 211, 79, 144, 172, 134, 29, 14, 233, 254, 56, 145, 101, 106, 35, 78, 168, 106, 138, 147, 191, 81, 162, 55, 219, 101, 186, 160, 13, 63, 74, 161, 150\n  ], \n  \"signatures\": [ \"a9e1d89bc06b40e94ea9a26059efc7ba5b2de7ef7c139831ca62f3fe0bb252008f8c7ee810d3e1e06313edf2db362fc39431755779466b635f12f9f32e44470a3e85e08a28fcd90633efc94aa4ae39153dfaf661089d045521343a3d63e8da08d7916753c66aaebd4eefcfe8e58e5b3d266b752c9ca110749fa33fce7c44270386fcf2bed4f03dd5dadb2dc1fd4c505419f8217b9eaec07521f0d8963e104603c926745039cf38d31de6ed95ace8e8a451f5a36f818c151f517546d55ac0f500e54d07b30ea7452f2e93fa4f60bdb30d71a0a97f97eb121e662006780fbf69002228224a96bff37893d47ec3707b17383906c0cd7d9e7412b3e6c8ccf1419b093c06c26f96e3453b424713cdc5c9575f81cda4e157052df11f4c40809edf420f88a3dd1f7909bbf77c8b184a933389094a88e480e900bcdbf6d1824742ee520fc0032e7d892a2b099b8c6edfd1123ce58a34458ee20cad676a7f7cfd80a28f0cb0888af88838310db372986bdcf9bfcae2324480ca7360d22bff21fb569a530e\"]\n}","block_height":110,"block_timestamp":1397823189,"confirmations":2992647,"double_spend_seen":false,"in_pool":false,"output_indices":[10,14,12,0,110,0,0,0],"prunable_as_hex":"","prunable_hash":"0000000000000000000000000000000000000000000000000000000000000000","pruned_as_hex":"","tx_hash":"beb76a82ea17400cd6d7f595f70e1667d2018ed8f5a78d1ce07484222618c3cd"}],"txs_as_hex":["0100010280e08d84ddcb0106010401110701f254220bb50d901a5523eaed438af5d43f8c6d0e54ba0632eb539884f6b7c02008c0a8a50402f9c7cf807ae74e56f4ec84db2bd93cfb02c2249b38e306f5b54b6e05d00d543b8095f52a02b6abb84e00f47f0a72e37b6b29392d906a38468404c57db3dbc5e8dd306a27a880d293ad0302cfc40a86723e7d459e90e45d47818dc0e81a1f451ace5137a4af8110a89a35ea80b4c4c321026b19c796338607d5a2c1ba240a167134142d72d1640ef07902da64fed0b10cfc8088aca3cf02021f6f655254fee84161118b32e7b6f8c31de5eb88aa00c29a8f57c0d1f95a24dd80d0b8e1981a023321af593163cea2ae37168ab926efd87f195756e3b723e886bdb7e618f751c480a094a58d1d0295ed2b08d1cf44482ae0060a5dcc4b7d810a85dea8c62e274f73862f3d59f8ed80a0e5b9c2910102dc50f2f28d7ceecd9a1147f7106c8d5b4e08b2ec77150f52dd7130ee4f5f50d42101d34f90ac861d0ee9fe3891656a234ea86a8a93bf51a237db65baa00d3f4aa196a9e1d89bc06b40e94ea9a26059efc7ba5b2de7ef7c139831ca62f3fe0bb252008f8c7ee810d3e1e06313edf2db362fc39431755779466b635f12f9f32e44470a3e85e08a28fcd90633efc94aa4ae39153dfaf661089d045521343a3d63e8da08d7916753c66aaebd4eefcfe8e58e5b3d266b752c9ca110749fa33fce7c44270386fcf2bed4f03dd5dadb2dc1fd4c505419f8217b9eaec07521f0d8963e104603c926745039cf38d31de6ed95ace8e8a451f5a36f818c151f517546d55ac0f500e54d07b30ea7452f2e93fa4f60bdb30d71a0a97f97eb121e662006780fbf69002228224a96bff37893d47ec3707b17383906c0cd7d9e7412b3e6c8ccf1419b093c06c26f96e3453b424713cdc5c9575f81cda4e157052df11f4c40809edf420f88a3dd1f7909bbf77c8b184a933389094a88e480e900bcdbf6d1824742ee520fc0032e7d892a2b099b8c6edfd1123ce58a34458ee20cad676a7f7cfd80a28f0cb0888af88838310db372986bdcf9bfcae2324480ca7360d22bff21fb569a530e"],"txs_as_json":["{\n  \"version\": 1, \n  \"unlock_time\": 0, \n  \"vin\": [ {\n      \"key\": {\n        \"amount\": 7000000000000, \n        \"key_offsets\": [ 1, 4, 1, 17, 7, 1\n        ], \n        \"k_image\": \"f254220bb50d901a5523eaed438af5d43f8c6d0e54ba0632eb539884f6b7c020\"\n      }\n    }\n  ], \n  \"vout\": [ {\n      \"amount\": 9000000, \n      \"target\": {\n        \"key\": \"f9c7cf807ae74e56f4ec84db2bd93cfb02c2249b38e306f5b54b6e05d00d543b\"\n      }\n    }, {\n      \"amount\": 90000000, \n      \"target\": {\n        \"key\": \"b6abb84e00f47f0a72e37b6b29392d906a38468404c57db3dbc5e8dd306a27a8\"\n      }\n    }, {\n      \"amount\": 900000000, \n      \"target\": {\n        \"key\": \"cfc40a86723e7d459e90e45d47818dc0e81a1f451ace5137a4af8110a89a35ea\"\n      }\n    }, {\n      \"amount\": 9000000000, \n      \"target\": {\n        \"key\": \"6b19c796338607d5a2c1ba240a167134142d72d1640ef07902da64fed0b10cfc\"\n      }\n    }, {\n      \"amount\": 90000000000, \n      \"target\": {\n        \"key\": \"1f6f655254fee84161118b32e7b6f8c31de5eb88aa00c29a8f57c0d1f95a24dd\"\n      }\n    }, {\n      \"amount\": 900000000000, \n      \"target\": {\n        \"key\": \"3321af593163cea2ae37168ab926efd87f195756e3b723e886bdb7e618f751c4\"\n      }\n    }, {\n      \"amount\": 1000000000000, \n      \"target\": {\n        \"key\": \"95ed2b08d1cf44482ae0060a5dcc4b7d810a85dea8c62e274f73862f3d59f8ed\"\n      }\n    }, {\n      \"amount\": 5000000000000, \n      \"target\": {\n        \"key\": \"dc50f2f28d7ceecd9a1147f7106c8d5b4e08b2ec77150f52dd7130ee4f5f50d4\"\n      }\n    }\n  ], \n  \"extra\": [ 1, 211, 79, 144, 172, 134, 29, 14, 233, 254, 56, 145, 101, 106, 35, 78, 168, 106, 138, 147, 191, 81, 162, 55, 219, 101, 186, 160, 13, 63, 74, 161, 150\n  ], \n  \"signatures\": [ \"a9e1d89bc06b40e94ea9a26059efc7ba5b2de7ef7c139831ca62f3fe0bb252008f8c7ee810d3e1e06313edf2db362fc39431755779466b635f12f9f32e44470a3e85e08a28fcd90633efc94aa4ae39153dfaf661089d045521343a3d63e8da08d7916753c66aaebd4eefcfe8e58e5b3d266b752c9ca110749fa33fce7c44270386fcf2bed4f03dd5dadb2dc1fd4c505419f8217b9eaec07521f0d8963e104603c926745039cf38d31de6ed95ace8e8a451f5a36f818c151f517546d55ac0f500e54d07b30ea7452f2e93fa4f60bdb30d71a0a97f97eb121e662006780fbf69002228224a96bff37893d47ec3707b17383906c0cd7d9e7412b3e6c8ccf1419b093c06c26f96e3453b424713cdc5c9575f81cda4e157052df11f4c40809edf420f88a3dd1f7909bbf77c8b184a933389094a88e480e900bcdbf6d1824742ee520fc0032e7d892a2b099b8c6edfd1123ce58a34458ee20cad676a7f7cfd80a28f0cb0888af88838310db372986bdcf9bfcae2324480ca7360d22bff21fb569a530e\"]\n}"],"untrusted":false}';
        $response = GetTransactionsResponse::fromJsonString($jsonResponse);
        print_r($response);

        $this->assertSame(110, $response->txs[0]->blockHeight);
        $this->assertSame(1397823189, $response->txs[0]->blockTimestamp);
        $this->assertSame(2992647, $response->txs[0]->confirmations);
        $this->assertFalse($response->txs[0]->doubleSpendSeen);
        $this->assertFalse($response->txs[0]->inPool);
        $this->assertSame([10,14,12,0,110,0,0,0], $response->txs[0]->outputIndices);
        $this->assertEmpty($response->txs[0]->prunableAsHex);
        $this->assertSame('0000000000000000000000000000000000000000000000000000000000000000', $response->txs[0]->prunableHash);
        $this->assertEmpty($response->txs[0]->prunedAsHex);
        $this->assertSame('beb76a82ea17400cd6d7f595f70e1667d2018ed8f5a78d1ce07484222618c3cd', $response->txs[0]->txHash);
        $this->assertInstanceOf(Transaction::class, $response->txs[0]->transaction);

        // Inputs
        $this->assertEquals(new Amount(7000000000000), $response->txs[0]->transaction->vin[0]->key->amount);
        $this->assertSame([ 1, 4, 1, 17, 7, 1], $response->txs[0]->transaction->vin[0]->key->keyOffsets);
        $this->assertSame('f254220bb50d901a5523eaed438af5d43f8c6d0e54ba0632eb539884f6b7c020', $response->txs[0]->transaction->vin[0]->key->keyImage);

        // Outputs
        $this->assertEquals(new Amount(9000000), $response->txs[0]->transaction->vout[0]->amount);
        $this->assertSame('f9c7cf807ae74e56f4ec84db2bd93cfb02c2249b38e306f5b54b6e05d00d543b', $response->txs[0]->transaction->vout[0]->key);
        $this->assertEmpty($response->txs[0]->transaction->vout[0]->viewTag);

        $this->assertSame([ 1, 211, 79, 144, 172, 134, 29, 14, 233, 254, 56, 145, 101, 106, 35, 78, 168, 106, 138, 147, 191, 81, 162, 55, 219, 101, 186, 160, 13, 63, 74, 161, 150], $response->txs[0]->transaction->extra);
        $this->assertSame([ "a9e1d89bc06b40e94ea9a26059efc7ba5b2de7ef7c139831ca62f3fe0bb252008f8c7ee810d3e1e06313edf2db362fc39431755779466b635f12f9f32e44470a3e85e08a28fcd90633efc94aa4ae39153dfaf661089d045521343a3d63e8da08d7916753c66aaebd4eefcfe8e58e5b3d266b752c9ca110749fa33fce7c44270386fcf2bed4f03dd5dadb2dc1fd4c505419f8217b9eaec07521f0d8963e104603c926745039cf38d31de6ed95ace8e8a451f5a36f818c151f517546d55ac0f500e54d07b30ea7452f2e93fa4f60bdb30d71a0a97f97eb121e662006780fbf69002228224a96bff37893d47ec3707b17383906c0cd7d9e7412b3e6c8ccf1419b093c06c26f96e3453b424713cdc5c9575f81cda4e157052df11f4c40809edf420f88a3dd1f7909bbf77c8b184a933389094a88e480e900bcdbf6d1824742ee520fc0032e7d892a2b099b8c6edfd1123ce58a34458ee20cad676a7f7cfd80a28f0cb0888af88838310db372986bdcf9bfcae2324480ca7360d22bff21fb569a530e"], $response->txs[0]->transaction->signatures);
    }

    public function testTransactionHf16()
    {
        $jsonResponse = '{"credits":0,"status":"OK","top_hash":"","txs":[{"as_hex":"aa","as_json":"{\n  \"version\": 2, \n  \"unlock_time\": 0, \n  \"vin\": [ {\n      \"key\": {\n        \"amount\": 0, \n        \"key_offsets\": [ 58228849, 17486, 8350, 143452, 313862, 354450, 112663, 7235, 14416, 77990, 47522, 161837, 77751, 18261, 3167, 3542\n        ], \n        \"k_image\": \"0a79e50444d3066f25e6649f583216c68d31cf8bf0270bf0e9ec5b4a34a71881\"\n      }\n    }, {\n      \"key\": {\n        \"amount\": 0, \n        \"key_offsets\": [ 51775382, 6083119, 103593, 993501, 3900, 44441, 124469, 332572, 71851, 11524, 16776, 23596, 2370, 4698, 377, 262\n        ], \n        \"k_image\": \"06b4d7a36e135464e0641bafd6fcd7ce3902133ef87ee55f3d24bb2f1a3dd07f\"\n      }\n    }\n  ], \n  \"vout\": [ {\n      \"amount\": 0, \n      \"target\": {\n        \"tagged_key\": {\n          \"key\": \"19b2a0cbc6388ca0d8ff02fc041e14082ebb1a36441c7413861da9c7456c289f\", \n          \"view_tag\": \"14\"\n        }\n      }\n    }, {\n      \"amount\": 0, \n      \"target\": {\n        \"tagged_key\": {\n          \"key\": \"901f21e02f62d1ea0a886faa5e47e2c7c67129e805049b369151e774653cbc1f\", \n          \"view_tag\": \"6b\"\n        }\n      }\n    }\n  ], \n  \"extra\": [ 1, 176, 230, 60, 229, 234, 126, 152, 131, 133, 70, 71, 240, 116, 137, 146, 21, 113, 162, 252, 227, 214, 230, 20, 90, 210, 72, 112, 220, 220, 129, 0, 223, 2, 9, 1, 15, 188, 94, 228, 56, 176, 243, 234\n  ], \n  \"rct_signatures\": {\n    \"type\": 6, \n    \"txnFee\": 44420000, \n    \"ecdhInfo\": [ {\n        \"amount\": \"be22546ed7eef141\"\n      }, {\n        \"amount\": \"6628aceb071eb325\"\n      }], \n    \"outPk\": [ \"b321d64148824796f4d2de83dfcc7e72003efea234ff42741b8774f1368d8ee9\", \"5dcb62a11ec4be5c147ffd92159001fe25a48a6abd3aeae73318b25586affb98\"]\n  }, \n  \"rctsig_prunable\": {\n    \"nbp\": 1, \n    \"bpp\": [ {\n        \"A\": \"8498d8dececb1f8bb1dbe78111d3399daad087cf3d8262e7ae768553b7e1ce24\", \n        \"A1\": \"0a1649b174c800e98354a6c996174cfd5d371dca2831857406a04456cf53fbb3\", \n        \"B\": \"90e8bf35f44d4b133f8bab056c234f8b28a8104476de78b526aad6ce7d2202ad\", \n        \"r1\": \"f496b2ee3edba59786811cc91c9d9e32e31f379cc936260bd25a1aca13ce9500\", \n        \"s1\": \"3ecae7cbd37f86d314c6b27a51a61897f3d404333e6e5813729fcbc0ba135906\", \n        \"d1\": \"08742e0429308a8bf5610d604729c6a76b8347772c49fda7dd540fa7a6edc40a\", \n        \"L\": [ \"a0b739b4c05cc1cb6c46a63e157b1023d953bf17fec16c05b731b42ec933486a\", \"e1253c3d4b16828833574ffbdb6c069c9db5f10365f95ed892590b14654245a5\", \"41cf4a33416f5ea7eb09002c6827df616b385cb1fa1fe5515376983be3b48dad\", \"7765bfd72135dd42a78f12b93f7ae39d99b8e0ff6e63012a07563d21cc68a58a\", \"37c34c6754890c5af6d7fb2a1477998d53e751fbf0f164ed9a9c49d1cabcf022\", \"75887eef2f636dd194d6c29e84b545b050453c7391b508b3b6f2d45b7be27a89\", \"9b783588de2aa63f7e433610b76bdaf5473494be1ad87eccc66bbf7f53501a2e\"\n        ], \n        \"R\": [ \"ea30901e16e172565c8751c25d3a57b89ac3b1e94f4a6ded0b86ddd6fd1ad645\", \"57eca4684e75ff6925f15f34f8a3d682cbc7e90b91a87e6b869185339dbd4c31\", \"5b86f71f566cf687a8d1f6b637088b1635e01cbd3f29cc2ecef9481eb730207e\", \"6078f0040f599540f19d745fd31e448ccd9b957eb7a44016f90ecd14df0568fc\", \"5a87b4626b61cc0ae4e2a3425771bd5c6453b690638d8fad1edb3825407c49b2\", \"9d3da92803940a0ab410aeaf03bdc9a6d5cc234693abec84815f28cc4ed11a99\", \"7b3082b948979f381c4a3f3ee6f334766c5a70f816dd82f0937bf52278d77cfd\"\n        ]\n      }\n    ], \n    \"CLSAGs\": [ {\n        \"s\": [ \"6c5d840ec15d0bb6a0325ee9d2d715622ce2fff1f1cb212f52319deccaf1aa08\", \"b99b983d83a1e42febb4afcbffbb4921429675c8fadba343cbf116284402a006\", \"346c16a3edfe63038e4a64f2d1bb97e2673294a79709514d0ba1e55f36527a0f\", \"a63817bd6c31ff4da03c01fafe1ed80ad0a50c643aac0c5e4a1a1f5089d97305\", \"69bdc75939b0e77982042839b0ee22b50d9491360bfcba031d3ccb7874dd8100\", \"94e711a4d2f7bf0266f31dc622797c4d6ee6f2dfd31d4da0084266ba9f298800\", \"87402e4c6b28eab11c2700840f4e09e91224e88ea664a46e1d21abf9e2c8f608\", \"e4a5b4aaa6391d0d2821d7041141a14fb04d7c88eabdad28a23f00860f413a01\", \"97cb5e40c3fad6fc7dffe3f10c05d950fdc5f1cc3baee5340c45fd6c652dea01\", \"6d2ba2ce751bcb1964774f5d611871aa61b054e749640886ae8c3c1563d10e0c\", \"accd02887b8db5d03eab3f9cbebe222905913d131f49dc996b4e2ee3548d810d\", \"63c29bbefa4a3c9cd7fe07c4b795abe1e5498f4fc721cee8d2e74ff8f9a4840d\", \"50ca14caf6ba5c6cab116fa71daf41266d3dce4d4ae947c49df54746d38e5b04\", \"617d2d3cfff4769a11a1b1bf4f7c7119fe4802fd614c4be061b79234c9534e07\", \"5c598f90787dda9c2a61eb8b27c6cb0e7b1dda2041e099020855017e10b77206\", \"0d5b9121bb72f6b1f979f8c98991c4b577fe8d1023a5b49fcc2c92c047a19904\"], \n        \"c1\": \"23090a367be8b542b65e13bdec171f50a6da0d829594b15582bdfd27be5aa30f\", \n        \"D\": \"fc9856a1ca89ee4041f4ad832cda5c4b5d226142a118bca72d459b20d75eb5da\"\n      }, {\n        \"s\": [ \"4717b78db7724b6591e51129750695c56eb20c6e11a41271b0008911823f190b\", \"ad124b69a084f1b1b3ab1f617e5a24a8bef5d3cc96682b4a4c021eb7b0259200\", \"25cea1597d9b73b5d7dd0e61e0ab035e05c2e9ad5a2b9da7bd3011051ef1980f\", \"a73767e6d4097e24a6511640ed9bff44093cf25f8e2f47cacf8277ed83033e0e\", \"659368933bc80a91b4a09976a5c2584d59c4f4c968ef976e9fdcd74c14388e06\", \"c46d0564fee1d286bbba10cd08afbfc15288bec34d1abcc15d0b51f234916e07\", \"3814477b752974d6eb515634a4b3ea07adad4b4426ff8bf5d6a49d5e24f67a0a\", \"6921fb128bf47dd8ed5afd3d06bdf97726af08d5c464293307c3887a1b915b02\", \"d8a480623366c9503010420496aaf3280665256096c85ee7ffa7a55c609e640f\", \"83fddba3e8caf97bc3962bf3aa2d52284363d23d2703d9bef83416ec81dd2a05\", \"b3c8d97268bde19601c1e6e97e30d7caa7478d853392f21166121dffe95d3b0d\", \"af1007b307ddaa261109879f595d8d1f86f765f37495101c7c2f1381d379b40e\", \"69c449f7b711f07153c9a10c0e25acfb8c56f34cf3c3f68f6bbb8c1dc3bf1b09\", \"1160f690338326346ebaae18d315f2bf6a3ec124c89639ab4b9265de7ae6690a\", \"82f402f7f9997cc16ab32d588b80795de77a1ebc20fe983c859257b7fb639e0d\", \"6388d30e1078f30e7bd3bd54af9752ae6f8bacfcad631f313b8b023be47c630f\"], \n        \"c1\": \"e768349d0d1efdc98d2b665d7088c09f6e997e1e8b6a9a5deb2fed944a71b800\", \n        \"D\": \"2cb8b45c00782c9c348a9e5c19d4609136c4ed882d8210d302d68dc9354982cf\"\n      }], \n    \"pseudoOuts\": [ \"1648c46579af35f8d3e6eb9d25488dc63f6e7f45231c431803ac1a0781942d3f\", \"ac66c79ef228708cde8a289d02ee08c77fe289e876b95f7a3327722b256ae573\"]\n  }\n}","block_height":2689610,"block_timestamp":1660505939,"confirmations":303147,"double_spend_seen":false,"in_pool":false,"output_indices":[59594642,59594643],"prunable_as_hex":"","prunable_hash":"df5d4dc9f14ec33610ece864d861019dc01a21e54230e7a81da1a43c18b891f9","pruned_as_hex":"","tx_hash":"4b9a3d529614a9727578d4818d8a6515d21054a3736579a59a52b4198405c43c"}],"txs_as_hex":["020002020010f180e21bce88019e41dce00886941392d11597f006c338d070a6e104a2f302adf009b7df04d58e01df18d61b0a79e50444d3066f25e6649f583216c68d31cf8bf0270bf0e9ec5b4a34a71881020010968fd818afa4f302a9a906ddd13cbc1e99db02b5cc079ca614abb104845a888301acb801c212da24f902860206b4d7a36e135464e0641bafd6fcd7ce3902133ef87ee55f3d24bb2f1a3dd07f02000319b2a0cbc6388ca0d8ff02fc041e14082ebb1a36441c7413861da9c7456c289f140003901f21e02f62d1ea0a886faa5e47e2c7c67129e805049b369151e774653cbc1f6b2c01b0e63ce5ea7e9883854647f07489921571a2fce3d6e6145ad24870dcdc8100df0209010fbc5ee438b0f3ea06a0979715be22546ed7eef1416628aceb071eb325b321d64148824796f4d2de83dfcc7e72003efea234ff42741b8774f1368d8ee95dcb62a11ec4be5c147ffd92159001fe25a48a6abd3aeae73318b25586affb98018498d8dececb1f8bb1dbe78111d3399daad087cf3d8262e7ae768553b7e1ce240a1649b174c800e98354a6c996174cfd5d371dca2831857406a04456cf53fbb390e8bf35f44d4b133f8bab056c234f8b28a8104476de78b526aad6ce7d2202adf496b2ee3edba59786811cc91c9d9e32e31f379cc936260bd25a1aca13ce95003ecae7cbd37f86d314c6b27a51a61897f3d404333e6e5813729fcbc0ba13590608742e0429308a8bf5610d604729c6a76b8347772c49fda7dd540fa7a6edc40a07a0b739b4c05cc1cb6c46a63e157b1023d953bf17fec16c05b731b42ec933486ae1253c3d4b16828833574ffbdb6c069c9db5f10365f95ed892590b14654245a541cf4a33416f5ea7eb09002c6827df616b385cb1fa1fe5515376983be3b48dad7765bfd72135dd42a78f12b93f7ae39d99b8e0ff6e63012a07563d21cc68a58a37c34c6754890c5af6d7fb2a1477998d53e751fbf0f164ed9a9c49d1cabcf02275887eef2f636dd194d6c29e84b545b050453c7391b508b3b6f2d45b7be27a899b783588de2aa63f7e433610b76bdaf5473494be1ad87eccc66bbf7f53501a2e07ea30901e16e172565c8751c25d3a57b89ac3b1e94f4a6ded0b86ddd6fd1ad64557eca4684e75ff6925f15f34f8a3d682cbc7e90b91a87e6b869185339dbd4c315b86f71f566cf687a8d1f6b637088b1635e01cbd3f29cc2ecef9481eb730207e6078f0040f599540f19d745fd31e448ccd9b957eb7a44016f90ecd14df0568fc5a87b4626b61cc0ae4e2a3425771bd5c6453b690638d8fad1edb3825407c49b29d3da92803940a0ab410aeaf03bdc9a6d5cc234693abec84815f28cc4ed11a997b3082b948979f381c4a3f3ee6f334766c5a70f816dd82f0937bf52278d77cfd6c5d840ec15d0bb6a0325ee9d2d715622ce2fff1f1cb212f52319deccaf1aa08b99b983d83a1e42febb4afcbffbb4921429675c8fadba343cbf116284402a006346c16a3edfe63038e4a64f2d1bb97e2673294a79709514d0ba1e55f36527a0fa63817bd6c31ff4da03c01fafe1ed80ad0a50c643aac0c5e4a1a1f5089d9730569bdc75939b0e77982042839b0ee22b50d9491360bfcba031d3ccb7874dd810094e711a4d2f7bf0266f31dc622797c4d6ee6f2dfd31d4da0084266ba9f29880087402e4c6b28eab11c2700840f4e09e91224e88ea664a46e1d21abf9e2c8f608e4a5b4aaa6391d0d2821d7041141a14fb04d7c88eabdad28a23f00860f413a0197cb5e40c3fad6fc7dffe3f10c05d950fdc5f1cc3baee5340c45fd6c652dea016d2ba2ce751bcb1964774f5d611871aa61b054e749640886ae8c3c1563d10e0caccd02887b8db5d03eab3f9cbebe222905913d131f49dc996b4e2ee3548d810d63c29bbefa4a3c9cd7fe07c4b795abe1e5498f4fc721cee8d2e74ff8f9a4840d50ca14caf6ba5c6cab116fa71daf41266d3dce4d4ae947c49df54746d38e5b04617d2d3cfff4769a11a1b1bf4f7c7119fe4802fd614c4be061b79234c9534e075c598f90787dda9c2a61eb8b27c6cb0e7b1dda2041e099020855017e10b772060d5b9121bb72f6b1f979f8c98991c4b577fe8d1023a5b49fcc2c92c047a1990423090a367be8b542b65e13bdec171f50a6da0d829594b15582bdfd27be5aa30ffc9856a1ca89ee4041f4ad832cda5c4b5d226142a118bca72d459b20d75eb5da4717b78db7724b6591e51129750695c56eb20c6e11a41271b0008911823f190bad124b69a084f1b1b3ab1f617e5a24a8bef5d3cc96682b4a4c021eb7b025920025cea1597d9b73b5d7dd0e61e0ab035e05c2e9ad5a2b9da7bd3011051ef1980fa73767e6d4097e24a6511640ed9bff44093cf25f8e2f47cacf8277ed83033e0e659368933bc80a91b4a09976a5c2584d59c4f4c968ef976e9fdcd74c14388e06c46d0564fee1d286bbba10cd08afbfc15288bec34d1abcc15d0b51f234916e073814477b752974d6eb515634a4b3ea07adad4b4426ff8bf5d6a49d5e24f67a0a6921fb128bf47dd8ed5afd3d06bdf97726af08d5c464293307c3887a1b915b02d8a480623366c9503010420496aaf3280665256096c85ee7ffa7a55c609e640f83fddba3e8caf97bc3962bf3aa2d52284363d23d2703d9bef83416ec81dd2a05b3c8d97268bde19601c1e6e97e30d7caa7478d853392f21166121dffe95d3b0daf1007b307ddaa261109879f595d8d1f86f765f37495101c7c2f1381d379b40e69c449f7b711f07153c9a10c0e25acfb8c56f34cf3c3f68f6bbb8c1dc3bf1b091160f690338326346ebaae18d315f2bf6a3ec124c89639ab4b9265de7ae6690a82f402f7f9997cc16ab32d588b80795de77a1ebc20fe983c859257b7fb639e0d6388d30e1078f30e7bd3bd54af9752ae6f8bacfcad631f313b8b023be47c630fe768349d0d1efdc98d2b665d7088c09f6e997e1e8b6a9a5deb2fed944a71b8002cb8b45c00782c9c348a9e5c19d4609136c4ed882d8210d302d68dc9354982cf1648c46579af35f8d3e6eb9d25488dc63f6e7f45231c431803ac1a0781942d3fac66c79ef228708cde8a289d02ee08c77fe289e876b95f7a3327722b256ae573"],"txs_as_json":["{\n  \"version\": 2, \n  \"unlock_time\": 0, \n  \"vin\": [ {\n      \"key\": {\n        \"amount\": 0, \n        \"key_offsets\": [ 58228849, 17486, 8350, 143452, 313862, 354450, 112663, 7235, 14416, 77990, 47522, 161837, 77751, 18261, 3167, 3542\n        ], \n        \"k_image\": \"0a79e50444d3066f25e6649f583216c68d31cf8bf0270bf0e9ec5b4a34a71881\"\n      }\n    }, {\n      \"key\": {\n        \"amount\": 0, \n        \"key_offsets\": [ 51775382, 6083119, 103593, 993501, 3900, 44441, 124469, 332572, 71851, 11524, 16776, 23596, 2370, 4698, 377, 262\n        ], \n        \"k_image\": \"06b4d7a36e135464e0641bafd6fcd7ce3902133ef87ee55f3d24bb2f1a3dd07f\"\n      }\n    }\n  ], \n  \"vout\": [ {\n      \"amount\": 0, \n      \"target\": {\n        \"tagged_key\": {\n          \"key\": \"19b2a0cbc6388ca0d8ff02fc041e14082ebb1a36441c7413861da9c7456c289f\", \n          \"view_tag\": \"14\"\n        }\n      }\n    }, {\n      \"amount\": 0, \n      \"target\": {\n        \"tagged_key\": {\n          \"key\": \"901f21e02f62d1ea0a886faa5e47e2c7c67129e805049b369151e774653cbc1f\", \n          \"view_tag\": \"6b\"\n        }\n      }\n    }\n  ], \n  \"extra\": [ 1, 176, 230, 60, 229, 234, 126, 152, 131, 133, 70, 71, 240, 116, 137, 146, 21, 113, 162, 252, 227, 214, 230, 20, 90, 210, 72, 112, 220, 220, 129, 0, 223, 2, 9, 1, 15, 188, 94, 228, 56, 176, 243, 234\n  ], \n  \"rct_signatures\": {\n    \"type\": 6, \n    \"txnFee\": 44420000, \n    \"ecdhInfo\": [ {\n        \"amount\": \"be22546ed7eef141\"\n      }, {\n        \"amount\": \"6628aceb071eb325\"\n      }], \n    \"outPk\": [ \"b321d64148824796f4d2de83dfcc7e72003efea234ff42741b8774f1368d8ee9\", \"5dcb62a11ec4be5c147ffd92159001fe25a48a6abd3aeae73318b25586affb98\"]\n  }, \n  \"rctsig_prunable\": {\n    \"nbp\": 1, \n    \"bpp\": [ {\n        \"A\": \"8498d8dececb1f8bb1dbe78111d3399daad087cf3d8262e7ae768553b7e1ce24\", \n        \"A1\": \"0a1649b174c800e98354a6c996174cfd5d371dca2831857406a04456cf53fbb3\", \n        \"B\": \"90e8bf35f44d4b133f8bab056c234f8b28a8104476de78b526aad6ce7d2202ad\", \n        \"r1\": \"f496b2ee3edba59786811cc91c9d9e32e31f379cc936260bd25a1aca13ce9500\", \n        \"s1\": \"3ecae7cbd37f86d314c6b27a51a61897f3d404333e6e5813729fcbc0ba135906\", \n        \"d1\": \"08742e0429308a8bf5610d604729c6a76b8347772c49fda7dd540fa7a6edc40a\", \n        \"L\": [ \"a0b739b4c05cc1cb6c46a63e157b1023d953bf17fec16c05b731b42ec933486a\", \"e1253c3d4b16828833574ffbdb6c069c9db5f10365f95ed892590b14654245a5\", \"41cf4a33416f5ea7eb09002c6827df616b385cb1fa1fe5515376983be3b48dad\", \"7765bfd72135dd42a78f12b93f7ae39d99b8e0ff6e63012a07563d21cc68a58a\", \"37c34c6754890c5af6d7fb2a1477998d53e751fbf0f164ed9a9c49d1cabcf022\", \"75887eef2f636dd194d6c29e84b545b050453c7391b508b3b6f2d45b7be27a89\", \"9b783588de2aa63f7e433610b76bdaf5473494be1ad87eccc66bbf7f53501a2e\"\n        ], \n        \"R\": [ \"ea30901e16e172565c8751c25d3a57b89ac3b1e94f4a6ded0b86ddd6fd1ad645\", \"57eca4684e75ff6925f15f34f8a3d682cbc7e90b91a87e6b869185339dbd4c31\", \"5b86f71f566cf687a8d1f6b637088b1635e01cbd3f29cc2ecef9481eb730207e\", \"6078f0040f599540f19d745fd31e448ccd9b957eb7a44016f90ecd14df0568fc\", \"5a87b4626b61cc0ae4e2a3425771bd5c6453b690638d8fad1edb3825407c49b2\", \"9d3da92803940a0ab410aeaf03bdc9a6d5cc234693abec84815f28cc4ed11a99\", \"7b3082b948979f381c4a3f3ee6f334766c5a70f816dd82f0937bf52278d77cfd\"\n        ]\n      }\n    ], \n    \"CLSAGs\": [ {\n        \"s\": [ \"6c5d840ec15d0bb6a0325ee9d2d715622ce2fff1f1cb212f52319deccaf1aa08\", \"b99b983d83a1e42febb4afcbffbb4921429675c8fadba343cbf116284402a006\", \"346c16a3edfe63038e4a64f2d1bb97e2673294a79709514d0ba1e55f36527a0f\", \"a63817bd6c31ff4da03c01fafe1ed80ad0a50c643aac0c5e4a1a1f5089d97305\", \"69bdc75939b0e77982042839b0ee22b50d9491360bfcba031d3ccb7874dd8100\", \"94e711a4d2f7bf0266f31dc622797c4d6ee6f2dfd31d4da0084266ba9f298800\", \"87402e4c6b28eab11c2700840f4e09e91224e88ea664a46e1d21abf9e2c8f608\", \"e4a5b4aaa6391d0d2821d7041141a14fb04d7c88eabdad28a23f00860f413a01\", \"97cb5e40c3fad6fc7dffe3f10c05d950fdc5f1cc3baee5340c45fd6c652dea01\", \"6d2ba2ce751bcb1964774f5d611871aa61b054e749640886ae8c3c1563d10e0c\", \"accd02887b8db5d03eab3f9cbebe222905913d131f49dc996b4e2ee3548d810d\", \"63c29bbefa4a3c9cd7fe07c4b795abe1e5498f4fc721cee8d2e74ff8f9a4840d\", \"50ca14caf6ba5c6cab116fa71daf41266d3dce4d4ae947c49df54746d38e5b04\", \"617d2d3cfff4769a11a1b1bf4f7c7119fe4802fd614c4be061b79234c9534e07\", \"5c598f90787dda9c2a61eb8b27c6cb0e7b1dda2041e099020855017e10b77206\", \"0d5b9121bb72f6b1f979f8c98991c4b577fe8d1023a5b49fcc2c92c047a19904\"], \n        \"c1\": \"23090a367be8b542b65e13bdec171f50a6da0d829594b15582bdfd27be5aa30f\", \n        \"D\": \"fc9856a1ca89ee4041f4ad832cda5c4b5d226142a118bca72d459b20d75eb5da\"\n      }, {\n        \"s\": [ \"4717b78db7724b6591e51129750695c56eb20c6e11a41271b0008911823f190b\", \"ad124b69a084f1b1b3ab1f617e5a24a8bef5d3cc96682b4a4c021eb7b0259200\", \"25cea1597d9b73b5d7dd0e61e0ab035e05c2e9ad5a2b9da7bd3011051ef1980f\", \"a73767e6d4097e24a6511640ed9bff44093cf25f8e2f47cacf8277ed83033e0e\", \"659368933bc80a91b4a09976a5c2584d59c4f4c968ef976e9fdcd74c14388e06\", \"c46d0564fee1d286bbba10cd08afbfc15288bec34d1abcc15d0b51f234916e07\", \"3814477b752974d6eb515634a4b3ea07adad4b4426ff8bf5d6a49d5e24f67a0a\", \"6921fb128bf47dd8ed5afd3d06bdf97726af08d5c464293307c3887a1b915b02\", \"d8a480623366c9503010420496aaf3280665256096c85ee7ffa7a55c609e640f\", \"83fddba3e8caf97bc3962bf3aa2d52284363d23d2703d9bef83416ec81dd2a05\", \"b3c8d97268bde19601c1e6e97e30d7caa7478d853392f21166121dffe95d3b0d\", \"af1007b307ddaa261109879f595d8d1f86f765f37495101c7c2f1381d379b40e\", \"69c449f7b711f07153c9a10c0e25acfb8c56f34cf3c3f68f6bbb8c1dc3bf1b09\", \"1160f690338326346ebaae18d315f2bf6a3ec124c89639ab4b9265de7ae6690a\", \"82f402f7f9997cc16ab32d588b80795de77a1ebc20fe983c859257b7fb639e0d\", \"6388d30e1078f30e7bd3bd54af9752ae6f8bacfcad631f313b8b023be47c630f\"], \n        \"c1\": \"e768349d0d1efdc98d2b665d7088c09f6e997e1e8b6a9a5deb2fed944a71b800\", \n        \"D\": \"2cb8b45c00782c9c348a9e5c19d4609136c4ed882d8210d302d68dc9354982cf\"\n      }], \n    \"pseudoOuts\": [ \"1648c46579af35f8d3e6eb9d25488dc63f6e7f45231c431803ac1a0781942d3f\", \"ac66c79ef228708cde8a289d02ee08c77fe289e876b95f7a3327722b256ae573\"]\n  }\n}"],"untrusted":false}';
        $response = GetTransactionsResponse::fromJsonString($jsonResponse);

        $this->assertSame(2689610, $response->txs[0]->blockHeight);
        $this->assertSame(1660505939, $response->txs[0]->blockTimestamp);
        $this->assertSame(303147, $response->txs[0]->confirmations);
        $this->assertFalse($response->txs[0]->doubleSpendSeen);
        $this->assertFalse($response->txs[0]->inPool);
        $this->assertSame([59594642,59594643], $response->txs[0]->outputIndices);
        $this->assertEmpty($response->txs[0]->prunableAsHex);
        $this->assertSame('df5d4dc9f14ec33610ece864d861019dc01a21e54230e7a81da1a43c18b891f9', $response->txs[0]->prunableHash);
        $this->assertEmpty($response->txs[0]->prunedAsHex);
        $this->assertSame('4b9a3d529614a9727578d4818d8a6515d21054a3736579a59a52b4198405c43c', $response->txs[0]->txHash);
        $this->assertInstanceOf(Transaction::class, $response->txs[0]->transaction);

        // Inputs
        $this->assertEquals(new Amount(0), $response->txs[0]->transaction->vin[0]->key->amount);
        $this->assertSame([ 58228849, 17486, 8350, 143452, 313862, 354450, 112663, 7235, 14416, 77990, 47522, 161837, 77751, 18261, 3167, 3542], $response->txs[0]->transaction->vin[0]->key->keyOffsets);
        $this->assertSame('0a79e50444d3066f25e6649f583216c68d31cf8bf0270bf0e9ec5b4a34a71881', $response->txs[0]->transaction->vin[0]->key->keyImage);

        // Outputs
        $this->assertEquals(new Amount(0), $response->txs[0]->transaction->vout[0]->amount);
        $this->assertSame('19b2a0cbc6388ca0d8ff02fc041e14082ebb1a36441c7413861da9c7456c289f', $response->txs[0]->transaction->vout[0]->key);
        $this->assertSame('14', $response->txs[0]->transaction->vout[0]->viewTag);

        $this->assertSame([ 1, 176, 230, 60, 229, 234, 126, 152, 131, 133, 70, 71, 240, 116, 137, 146, 21, 113, 162, 252, 227, 214, 230, 20, 90, 210, 72, 112, 220, 220, 129, 0, 223, 2, 9, 1, 15, 188, 94, 228, 56, 176, 243, 234], $response->txs[0]->transaction->extra);
        $this->assertEmpty($response->txs[0]->transaction->signatures);
    }

    public function testStopDaemon()
    {
        $jsonResponse = '{"status":"OK","untrusted":false}';
        $response = StopDaemonResponse::fromJsonString($jsonResponse);
        $this->assertSame($jsonResponse, $response->toJson());
    }

    public static function comparableJson(string $json): string
    {
        return json_encode(json_decode($json, flags: JSON_BIGINT_AS_STRING));
    }
}
