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
use RefRing\MoneroRpcPhp\DaemonOther\GetTransactionPoolResponse;
use RefRing\MoneroRpcPhp\DaemonOther\GetTransactionPoolStatsResponse;
use RefRing\MoneroRpcPhp\DaemonOther\GetTransactionsResponse;
use RefRing\MoneroRpcPhp\DaemonOther\InPeersResponse;
use RefRing\MoneroRpcPhp\DaemonOther\IsKeyImageSpentResponse;
use RefRing\MoneroRpcPhp\DaemonOther\MiningStatusResponse;
use RefRing\MoneroRpcPhp\DaemonOther\Model\Output;
use RefRing\MoneroRpcPhp\DaemonOther\Model\TransactionData;
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
use RefRing\MoneroRpcPhp\Model\Amount;

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
        $this->assertInstanceOf(TransactionData::class, $response->txs[0]->transaction);

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
        $this->assertInstanceOf(TransactionData::class, $response->txs[0]->transaction);

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

    public function testGetTransactionPool()
    {
        $jsonResponse = '{"spent_key_images":[{"id_hash":"46c784f381bb6a1dfdd9d131f6e4692197f2a48b901b14b720ca6387956d8c58","txs_hashes":["9be8f02bb10bfad7209ff976d9875df75b48a09440a81f2722ef25df78c6cd4b"]},{"id_hash":"977296366a94c10c1d83e95d7a89caff7be70be72f35e940153fd127efdabe6b","txs_hashes":["9be8f02bb10bfad7209ff976d9875df75b48a09440a81f2722ef25df78c6cd4b"]}],"transactions":[{"blob_size":1525,"do_not_relay":false,"double_spend_seen":false,"fee":160400000,"id_hash":"c4fb8ddd655ae074f55024f32494b82fd4f9258e78886b6b9e4572d45481ee12","kept_by_block":false,"last_failed_height":0,"last_failed_id_hash":"0000000000000000000000000000000000000000000000000000000000000000","last_relayed_time":1697049076,"max_used_block_height":2993717,"max_used_block_id_hash":"645680ac1816e39026039776f90476697ffc1c708cc8fb0f60ad5d17b9437d65","receive_time":1697049076,"relayed":true,"tx_blob":"020001020010aebfe42681dc09fff706e051dd98018c69fb282ba8019172f021fb09ae4801c704c00297614f817738a6abc4783fb65c426ffe8884b682106c95442574f95d7dff64a402000371ce17a14664624f3e5ceec1a603472390c3e805e4022690b071ff8cb38ce1262300037c3b81308ee8f06fc9584a43be2e0e66665d87babc66506d53fc5075f611944b1d2c01b2c478ca30a13efe58d6e1d69590fa96059a9654dba25267f31b10ac518f588f020901666cd1f45ddde98b068085be4c368ca17375017e3fea7e7bc558743d053e6ac059410f212f86c995fb161dea4244710bb33d5ef3e9f1eb157943d043ac62035c6c48a47357e257a1e0422815239bd907dc589c7ba84ed494a7c99c323201d363d086ce95beb0e2bef702ff53ada4317cd04d47a3b9ab8cbae6dcb2b8792cafd2a76ebe3304f1e6023c1d28dc3049151b32dc55191315468ce15e8e454170945c52e72f42a4987de563878604b6c275739af2fe93d2d2a7a0d9fc76db3802e6f494508b17224364299686023701b8ba471606a716514edcacc5a2751c980258b0bfe630c529be0577c0d7bf39090a4d819f6a666517790f485c2904bd68070c7b4d42a8ffaf45f304194d4efde53c75f556370e5e5f6b85247191ad3b8c020779bcfba2d168f19b7c18fc5724a6636fc1340bb62990b383e2ba74b262c75bab072b911a6167931767145159c20144f8e9ae17486fc6ea5c199aa1e25deca525eab5362db3e96686acf0f73096aa544efcec7da2c7a4e5169290693b6856891fdb63f4a1ca141587fcf1f33a7940609379195171cf6879cf76e098e1061c0998b6e9be56af83288f3ebb3476b63e03a6f060054a13bbd88a2efabc79bbdb375a8b241fad28070097a2231b23489094c9b9a9f87923ad0971cd8718274a41fb373ea5d9d6479371427356a1cb8afdbe842620881035d1b5956984ffb4f28663c907747a7d27f54c65d13c279c8358942bdf5d1ce8de990f6865b59167fe29da6bf26a30eda1155f26a8672e63612a7b5456f242352579071b2b45d6ea8ac0bcc4b1ee9434e61fc77d9de41ccd75681db7f3b57fdce4a85e7810961f7f156f1ff8248815861e4362f770a8e32fd6461d01ee44ed3f6f48be6ccb20d5fd37292145f8fbb170c6eb41d1471adde6bccc5bd050654d51647009b5dbd92fd87eb85b119bdaa300e6edda3825a0acecff7d34d65543bbeb68a58dd35a920b56b7c52c75b2fd887eefd57f27a6421258de426e42bc4661a9592eccd4d9aa29ca7c0553befbeeb6da95bc737a36c0714cc653c85f3309c1a1aece3484984a1d6d9ec92c5f0762d5e0115a87b9bdae9cb86228eaf48c376cb870e782aedf52babcd17f5b8703892f7067b5ba36ea197e39174176872f838f6c0b331156e6dfa8406ab926d101c5bf164de78ea5a40725a1ec0cbe24504a598114e6deb130ca3926412a96c60ace9b54935bf4af369c0f16fcaf30c604edfe7f8911a4c813ff11ea53dac1530b34f2d85cccb3d3b33c6287532788e4cfcd38c2783a34d2182d2ce4fe41984a02ab64a460a89543fbf1fff9ab39072813832524fdd5184069b0d40613a8e790091efd1cb11bb0deca9afee9ad0a46d6c733694a063f00fe40ee949926a6e7c5049b880b59dfbf8cff0a136a75a348c9989828d09d4f796e6153d956fe689b910d1a21d0ddb2d00beaed54a9f2cb4f6311717ee84d036e15ffd73df919b6af9402cbe75c84469a834c81eeac9007cbbc203bcdcc53720381b4b278a6be2fd6ff045637652b23c25ce0a2eec07c47f62f947816aa7c28fa4ffd4c40abf27adc1803f023f8a036b658d6ea20c47cd5e24cbabc47b28a9eff7bf8c7472f374a85000f33e8f9250954e017614d5cfeb4b96b6c985e889150002dab4250a700e7d4530c1179d39a4a3e28b493da07497cb9d2378db9118586a64abd7ecfafc97384ba03170dd4bf5690c634d534f3cd01d38d70a1cd3ca3b855334f53846a2aaaa45b0a50cb4d9edf7d538c466c897eaad30476c983a4cdf45b96d4c477ef5d9eaa8300d4ace8395df7c683166d57b7e10f222ec91638bd44d1cd9d0857bbb0083db605164f36d4bff6788c414923b247d755b331d9a3a8f68ea990af66a54ea0192b75","tx_json":"{\n  \"version\": 2, \n  \"unlock_time\": 0, \n  \"vin\": [ {\n      \"key\": {\n        \"amount\": 0, \n        \"key_offsets\": [ 81338286, 159233, 113663, 10464, 19549, 13452, 5243, 43, 168, 14609, 4336, 1275, 9262, 1, 583, 320\n        ], \n        \"k_image\": \"97614f817738a6abc4783fb65c426ffe8884b682106c95442574f95d7dff64a4\"\n      }\n    }\n  ], \n  \"vout\": [ {\n      \"amount\": 0, \n      \"target\": {\n        \"tagged_key\": {\n          \"key\": \"71ce17a14664624f3e5ceec1a603472390c3e805e4022690b071ff8cb38ce126\", \n          \"view_tag\": \"23\"\n        }\n      }\n    }, {\n      \"amount\": 0, \n      \"target\": {\n        \"tagged_key\": {\n          \"key\": \"7c3b81308ee8f06fc9584a43be2e0e66665d87babc66506d53fc5075f611944b\", \n          \"view_tag\": \"1d\"\n        }\n      }\n    }\n  ], \n  \"extra\": [ 1, 178, 196, 120, 202, 48, 161, 62, 254, 88, 214, 225, 214, 149, 144, 250, 150, 5, 154, 150, 84, 219, 162, 82, 103, 243, 27, 16, 172, 81, 143, 88, 143, 2, 9, 1, 102, 108, 209, 244, 93, 221, 233, 139\n  ], \n  \"rct_signatures\": {\n    \"type\": 6, \n    \"txnFee\": 160400000, \n    \"ecdhInfo\": [ {\n        \"amount\": \"368ca17375017e3f\"\n      }, {\n        \"amount\": \"ea7e7bc558743d05\"\n      }], \n    \"outPk\": [ \"3e6ac059410f212f86c995fb161dea4244710bb33d5ef3e9f1eb157943d043ac\", \"62035c6c48a47357e257a1e0422815239bd907dc589c7ba84ed494a7c99c3232\"]\n  }, \n  \"rctsig_prunable\": {\n    \"nbp\": 1, \n    \"bpp\": [ {\n        \"A\": \"d363d086ce95beb0e2bef702ff53ada4317cd04d47a3b9ab8cbae6dcb2b8792c\", \n        \"A1\": \"afd2a76ebe3304f1e6023c1d28dc3049151b32dc55191315468ce15e8e454170\", \n        \"B\": \"945c52e72f42a4987de563878604b6c275739af2fe93d2d2a7a0d9fc76db3802\", \n        \"r1\": \"e6f494508b17224364299686023701b8ba471606a716514edcacc5a2751c9802\", \n        \"s1\": \"58b0bfe630c529be0577c0d7bf39090a4d819f6a666517790f485c2904bd6807\", \n        \"d1\": \"0c7b4d42a8ffaf45f304194d4efde53c75f556370e5e5f6b85247191ad3b8c02\", \n        \"L\": [ \"79bcfba2d168f19b7c18fc5724a6636fc1340bb62990b383e2ba74b262c75bab\", \"072b911a6167931767145159c20144f8e9ae17486fc6ea5c199aa1e25deca525\", \"eab5362db3e96686acf0f73096aa544efcec7da2c7a4e5169290693b6856891f\", \"db63f4a1ca141587fcf1f33a7940609379195171cf6879cf76e098e1061c0998\", \"b6e9be56af83288f3ebb3476b63e03a6f060054a13bbd88a2efabc79bbdb375a\", \"8b241fad28070097a2231b23489094c9b9a9f87923ad0971cd8718274a41fb37\", \"3ea5d9d6479371427356a1cb8afdbe842620881035d1b5956984ffb4f28663c9\"\n        ], \n        \"R\": [ \"747a7d27f54c65d13c279c8358942bdf5d1ce8de990f6865b59167fe29da6bf2\", \"6a30eda1155f26a8672e63612a7b5456f242352579071b2b45d6ea8ac0bcc4b1\", \"ee9434e61fc77d9de41ccd75681db7f3b57fdce4a85e7810961f7f156f1ff824\", \"8815861e4362f770a8e32fd6461d01ee44ed3f6f48be6ccb20d5fd37292145f8\", \"fbb170c6eb41d1471adde6bccc5bd050654d51647009b5dbd92fd87eb85b119b\", \"daa300e6edda3825a0acecff7d34d65543bbeb68a58dd35a920b56b7c52c75b2\", \"fd887eefd57f27a6421258de426e42bc4661a9592eccd4d9aa29ca7c0553befb\"\n        ]\n      }\n    ], \n    \"CLSAGs\": [ {\n        \"s\": [ \"eeb6da95bc737a36c0714cc653c85f3309c1a1aece3484984a1d6d9ec92c5f07\", \"62d5e0115a87b9bdae9cb86228eaf48c376cb870e782aedf52babcd17f5b8703\", \"892f7067b5ba36ea197e39174176872f838f6c0b331156e6dfa8406ab926d101\", \"c5bf164de78ea5a40725a1ec0cbe24504a598114e6deb130ca3926412a96c60a\", \"ce9b54935bf4af369c0f16fcaf30c604edfe7f8911a4c813ff11ea53dac1530b\", \"34f2d85cccb3d3b33c6287532788e4cfcd38c2783a34d2182d2ce4fe41984a02\", \"ab64a460a89543fbf1fff9ab39072813832524fdd5184069b0d40613a8e79009\", \"1efd1cb11bb0deca9afee9ad0a46d6c733694a063f00fe40ee949926a6e7c504\", \"9b880b59dfbf8cff0a136a75a348c9989828d09d4f796e6153d956fe689b910d\", \"1a21d0ddb2d00beaed54a9f2cb4f6311717ee84d036e15ffd73df919b6af9402\", \"cbe75c84469a834c81eeac9007cbbc203bcdcc53720381b4b278a6be2fd6ff04\", \"5637652b23c25ce0a2eec07c47f62f947816aa7c28fa4ffd4c40abf27adc1803\", \"f023f8a036b658d6ea20c47cd5e24cbabc47b28a9eff7bf8c7472f374a85000f\", \"33e8f9250954e017614d5cfeb4b96b6c985e889150002dab4250a700e7d4530c\", \"1179d39a4a3e28b493da07497cb9d2378db9118586a64abd7ecfafc97384ba03\", \"170dd4bf5690c634d534f3cd01d38d70a1cd3ca3b855334f53846a2aaaa45b0a\"], \n        \"c1\": \"50cb4d9edf7d538c466c897eaad30476c983a4cdf45b96d4c477ef5d9eaa8300\", \n        \"D\": \"d4ace8395df7c683166d57b7e10f222ec91638bd44d1cd9d0857bbb0083db605\"\n      }], \n    \"pseudoOuts\": [ \"164f36d4bff6788c414923b247d755b331d9a3a8f68ea990af66a54ea0192b75\"]\n  }\n}","weight":1525},{"blob_size":2220,"do_not_relay":false,"double_spend_seen":false,"fee":44400000,"id_hash":"a3addd5008f1913055710156f9cf08dd0edb67c8420470f4b80ffb8dca00e11f","kept_by_block":false,"last_failed_height":0,"last_failed_id_hash":"0000000000000000000000000000000000000000000000000000000000000000","last_relayed_time":1697049090,"max_used_block_height":2993739,"max_used_block_id_hash":"235ff05056e9ef70f71e5ec746d5b897e0fa23cca9a11bd17d6ec02f8ed2610a","receive_time":1697049090,"relayed":true,"tx_blob":"02000202001095a9b71e98ede201ce82ad03879bb502e8bc5faeb70aa660cf8301ecec07d986048c3bf77df3d001db398be201896dbc3b82d53be18157a9a80d93d70220647077c9b898809db40211ffee4195ba3c020010c4aac524c6beee01cd9d2fcdc60db3df02acbe03de01e429d013fbb701c03f8a37cf12cb0868ad0546bfbfdbbd834f6e61f1de8e7eb1cf4905e7d9a627c04e737f06734fd974ccb702000337d87d58a6e6421e3d3c68279601fdc07dfe291e2d69f579a1f2383c01ef94ba230003247507ca2860440f7da785869c03a2d596f293d1955d33f9c0fa7d821c1d79cd1e2c01b0dcd348005fa66c1cfafdd5dcc603046293acee9d53058c0e8f43316a9de46102090111e6695b9964f33b0680fb95158994d70de8e4932060a84c9c7ed235471f60019f8fc1bf86c57bcb838fb89e79af0231101a7122c6f9fc5ef20731e3f6f5d7fb73790269775dfb5e289b43419af731d0ac672c67955b6c5488a735b385019264b69232f106acc7e28aa75638811dd636110408741ff0bd6d1ce0dd4330fe2068e24e731e5f532aac61cbae18ab0bd4ccccbd7123e7827ee2b0747201d76ca3e109b33712c0b96964370641877fbe4ccd5541a8a5c055e618d593b443e64aded0df4766f79cc2b2cba106f79d8bf34744ce8c8abc8b137a13c31919bc410b4502b1344431ddd92957ffbade96b43d5425a4e383dc6497f69aeb70a305e70356cc2553428dd14909fd7a6c84d59026b2cb42c2b446f2a2c6820d9bbc42650e077e5ec1cfb25adc992bb8ae9f4d54ea5196ec0a0121bc4bcc1fc97698f058ddc9cb5be3b4f0b77fccf2ea6d00577da20cff51453cd69a800388a35b25a76725a39faaa7f1b8a5c81e3b1d8d4943882131d9ce20a7263d05f92fb4faa93ad13d87a2e7219b6c64eb1db11932c526e4571973330d8508f40abbfabd95d1214c1de1418d8fe5c6b2d39681f81a7c700f910e1ea320d30a858296360fe1f0052df745a301fef9af755a0fdcc3033895afa9433c5c85f22560dcdef552f5675663b611df2e50400e63a2476f10d214894f30539915d26b93ac3e414f73dc6a97fd8e3907173ed4a0aa4a4606f3615ce40f5d97b3486c65557844c2a14563d16ed40a682ad14f51992149c2e9a0faf5fe83c96456204e22fed92200facce6faadd0723ac6049e9ece4a500e2781cd7a274c36eef35038911af43cb230974ef515781c9575f6ea7a8eb9297252ae75fbe647cf93d34a10f2bf8191959e11f03691d06f3fea927f35f2da31bb01b75056d96ce4158f8dcb250e939dd702ecd49a5d00dde1e85b49da9a74357f856707ec71606967b88b5d5afeb028c4ba523748bd98813d9063798cffdf2beaf2818b9edd8e356d2d374ae0c27cd51de4cce0a002acf3c84853d6ce462e1938d651a09bbe808a05b257bb326d89e6d11c9ca834c73e71f8029a99386cd127ec1ac263368b5dedf63ac07aeb223d7373fc7e87cbca64c5d10e82f6a1bb41ecffbd50fefecbb2bb678e2c586a9030ad45fd8e743c06e0de2105e9fdb6208749e6bb7875a0543e789503414eda5b9a7294af0b7ee87310d115039459ee1d5aa98d5555e660fe590ee5ac6622e9b1a037ece57e7e51d3e6494d0b7cd9c53c55ddc372cd0229afbf9d81a9adc925651c6a4d65f9c782488220c305983985a905593c65dd73a612acd8fc0579e93477d9165a8d8b872f88eca1e7052c40685f34aa4d36490ebf5008bc15871d9b66f297247995865820b4792a7f02120b08ff8fff15e111af43e8f6b2897be64f40562c5642c58e207a468594a605d55b818ec6d6f3a6caa10ca0cc7245128c562b750d9b14914d55c984b671ef0b1999ad122aee91d4dffd8c8d13e4bf6196dee5b40037142861495a413c79570e1187a82d6e6a5ae1714ad79a286f1230bebe60a0d1e973d5a9bb76b654a565081e53b03eabcc5cc98a39e8b14c3476a03eb2a3f19f32c79a432efe7651a11c060b9cafee4137d3e503645b73c0c176e7a9f1d9669553e8fac919de3bfbe67d05d90da61131d550e9de379035701aa35621b683f7e0e54f7c64eb3b731ce77a06aa28fcd284e5cfa5c2b2746cb895bc3741e93f62de2b16082a712e40f77516085ff93201d5fc91e129e83d963ec1bf1f57f2fedf9f62dea74b71fe495ded790310703da2e567940b8c45bfeb75383a02ada93fe38abfc72bec01690b13f1b4df622e98ad34167aeb4233eddb67aa2ce0096720724d9aaada26aec77bf89c720985dc4c36aa33038b181825eeedf77271b2704a65ac3f8fe12bd1a6911d06c203a66788125782535e87b4b9ade069d6121e0307ad1a8746c321b2424d493dfd0b09c23de56b67f450afeb478bbc11af9e12bfa0294a90954b62fc5d915086c80d2f41031fad47efcbbfb67f8568d1161103dda4c1f32dc662217a76da9d2f8c03577ce2f32b6616cc1a8fcf4034eedc46ba6e2a53a19abb5863c57b0424ae8e0961387a5fad3a0ba6acd2d913639bfcebff089d48556a2f91ee33404498227306dd0438b6f90ad1d9336a529a53aeee11b801f4f0ca77befd1c9a0673fa90ef08bd7d8007595e765cbe848f866b626f9b83f1a1a363b629edd2d7e201926b7905c07b916b8cc357bfad3932fa8eaebfc243c656db6eca68847f4258ddbb21a20f60e695ba8d0c4fe34f87e3185a987ea4cc21861b3e3630bcf2f05177529d530b8238b80b9d90e961482615a2b3ef6f8179d0e7bf88fc46e51da7cf3a109c040615318d6027364091a89fc2d2326b6fef4207520f50e6e628cbb5a8999e6ef20b532f15150e88e15255b837877537491ab5865500c91af5262909ab1c8e3637090fe42c38685f4895420313a298a8c65f7318984f6cacf5b705d29615b99ee90988252dd5ab3cc419d1f0fe6f5a009a2ec40200d84e84b8e060d6fd057c46850fe1b36b2327ca88736f8b3a57e6ea455c1b42190a13991ea1c4aea0b7763397062a47003a81b17e8840dadf45c7dc185af458446dee2682c12283f678f025f2333606665d2923b409315954289ff7c70e4c92957a21d9f20aef0638555b17491992f157a8aeca7fda1108c81d79e015ae464316cd94153ba8980c776b7558f542","tx_json":"{\n  \"version\": 2, \n  \"unlock_time\": 0, \n  \"vin\": [ {\n      \"key\": {\n        \"amount\": 0, \n        \"key_offsets\": [ 63820949, 3716760, 7029070, 5066119, 1564264, 170926, 12326, 16847, 128620, 66393, 7564, 16119, 26739, 7387, 28939, 13961\n        ], \n        \"k_image\": \"bc3b82d53be18157a9a80d93d70220647077c9b898809db40211ffee4195ba3c\"\n      }\n    }, {\n      \"key\": {\n        \"amount\": 0, \n        \"key_offsets\": [ 76633412, 3907398, 773837, 222029, 44979, 57132, 222, 5348, 2512, 23547, 8128, 7050, 2383, 1099, 104, 685\n        ], \n        \"k_image\": \"46bfbfdbbd834f6e61f1de8e7eb1cf4905e7d9a627c04e737f06734fd974ccb7\"\n      }\n    }\n  ], \n  \"vout\": [ {\n      \"amount\": 0, \n      \"target\": {\n        \"tagged_key\": {\n          \"key\": \"37d87d58a6e6421e3d3c68279601fdc07dfe291e2d69f579a1f2383c01ef94ba\", \n          \"view_tag\": \"23\"\n        }\n      }\n    }, {\n      \"amount\": 0, \n      \"target\": {\n        \"tagged_key\": {\n          \"key\": \"247507ca2860440f7da785869c03a2d596f293d1955d33f9c0fa7d821c1d79cd\", \n          \"view_tag\": \"1e\"\n        }\n      }\n    }\n  ], \n  \"extra\": [ 1, 176, 220, 211, 72, 0, 95, 166, 108, 28, 250, 253, 213, 220, 198, 3, 4, 98, 147, 172, 238, 157, 83, 5, 140, 14, 143, 67, 49, 106, 157, 228, 97, 2, 9, 1, 17, 230, 105, 91, 153, 100, 243, 59\n  ], \n  \"rct_signatures\": {\n    \"type\": 6, \n    \"txnFee\": 44400000, \n    \"ecdhInfo\": [ {\n        \"amount\": \"8994d70de8e49320\"\n      }, {\n        \"amount\": \"60a84c9c7ed23547\"\n      }], \n    \"outPk\": [ \"1f60019f8fc1bf86c57bcb838fb89e79af0231101a7122c6f9fc5ef20731e3f6\", \"f5d7fb73790269775dfb5e289b43419af731d0ac672c67955b6c5488a735b385\"]\n  }, \n  \"rctsig_prunable\": {\n    \"nbp\": 1, \n    \"bpp\": [ {\n        \"A\": \"9264b69232f106acc7e28aa75638811dd636110408741ff0bd6d1ce0dd4330fe\", \n        \"A1\": \"2068e24e731e5f532aac61cbae18ab0bd4ccccbd7123e7827ee2b0747201d76c\", \n        \"B\": \"a3e109b33712c0b96964370641877fbe4ccd5541a8a5c055e618d593b443e64a\", \n        \"r1\": \"ded0df4766f79cc2b2cba106f79d8bf34744ce8c8abc8b137a13c31919bc410b\", \n        \"s1\": \"4502b1344431ddd92957ffbade96b43d5425a4e383dc6497f69aeb70a305e703\", \n        \"d1\": \"56cc2553428dd14909fd7a6c84d59026b2cb42c2b446f2a2c6820d9bbc42650e\", \n        \"L\": [ \"7e5ec1cfb25adc992bb8ae9f4d54ea5196ec0a0121bc4bcc1fc97698f058ddc9\", \"cb5be3b4f0b77fccf2ea6d00577da20cff51453cd69a800388a35b25a76725a3\", \"9faaa7f1b8a5c81e3b1d8d4943882131d9ce20a7263d05f92fb4faa93ad13d87\", \"a2e7219b6c64eb1db11932c526e4571973330d8508f40abbfabd95d1214c1de1\", \"418d8fe5c6b2d39681f81a7c700f910e1ea320d30a858296360fe1f0052df745\", \"a301fef9af755a0fdcc3033895afa9433c5c85f22560dcdef552f5675663b611\", \"df2e50400e63a2476f10d214894f30539915d26b93ac3e414f73dc6a97fd8e39\"\n        ], \n        \"R\": [ \"173ed4a0aa4a4606f3615ce40f5d97b3486c65557844c2a14563d16ed40a682a\", \"d14f51992149c2e9a0faf5fe83c96456204e22fed92200facce6faadd0723ac6\", \"049e9ece4a500e2781cd7a274c36eef35038911af43cb230974ef515781c9575\", \"f6ea7a8eb9297252ae75fbe647cf93d34a10f2bf8191959e11f03691d06f3fea\", \"927f35f2da31bb01b75056d96ce4158f8dcb250e939dd702ecd49a5d00dde1e8\", \"5b49da9a74357f856707ec71606967b88b5d5afeb028c4ba523748bd98813d90\", \"63798cffdf2beaf2818b9edd8e356d2d374ae0c27cd51de4cce0a002acf3c848\"\n        ]\n      }\n    ], \n    \"CLSAGs\": [ {\n        \"s\": [ \"53d6ce462e1938d651a09bbe808a05b257bb326d89e6d11c9ca834c73e71f802\", \"9a99386cd127ec1ac263368b5dedf63ac07aeb223d7373fc7e87cbca64c5d10e\", \"82f6a1bb41ecffbd50fefecbb2bb678e2c586a9030ad45fd8e743c06e0de2105\", \"e9fdb6208749e6bb7875a0543e789503414eda5b9a7294af0b7ee87310d11503\", \"9459ee1d5aa98d5555e660fe590ee5ac6622e9b1a037ece57e7e51d3e6494d0b\", \"7cd9c53c55ddc372cd0229afbf9d81a9adc925651c6a4d65f9c782488220c305\", \"983985a905593c65dd73a612acd8fc0579e93477d9165a8d8b872f88eca1e705\", \"2c40685f34aa4d36490ebf5008bc15871d9b66f297247995865820b4792a7f02\", \"120b08ff8fff15e111af43e8f6b2897be64f40562c5642c58e207a468594a605\", \"d55b818ec6d6f3a6caa10ca0cc7245128c562b750d9b14914d55c984b671ef0b\", \"1999ad122aee91d4dffd8c8d13e4bf6196dee5b40037142861495a413c79570e\", \"1187a82d6e6a5ae1714ad79a286f1230bebe60a0d1e973d5a9bb76b654a56508\", \"1e53b03eabcc5cc98a39e8b14c3476a03eb2a3f19f32c79a432efe7651a11c06\", \"0b9cafee4137d3e503645b73c0c176e7a9f1d9669553e8fac919de3bfbe67d05\", \"d90da61131d550e9de379035701aa35621b683f7e0e54f7c64eb3b731ce77a06\", \"aa28fcd284e5cfa5c2b2746cb895bc3741e93f62de2b16082a712e40f7751608\"], \n        \"c1\": \"5ff93201d5fc91e129e83d963ec1bf1f57f2fedf9f62dea74b71fe495ded7903\", \n        \"D\": \"10703da2e567940b8c45bfeb75383a02ada93fe38abfc72bec01690b13f1b4df\"\n      }, {\n        \"s\": [ \"622e98ad34167aeb4233eddb67aa2ce0096720724d9aaada26aec77bf89c7209\", \"85dc4c36aa33038b181825eeedf77271b2704a65ac3f8fe12bd1a6911d06c203\", \"a66788125782535e87b4b9ade069d6121e0307ad1a8746c321b2424d493dfd0b\", \"09c23de56b67f450afeb478bbc11af9e12bfa0294a90954b62fc5d915086c80d\", \"2f41031fad47efcbbfb67f8568d1161103dda4c1f32dc662217a76da9d2f8c03\", \"577ce2f32b6616cc1a8fcf4034eedc46ba6e2a53a19abb5863c57b0424ae8e09\", \"61387a5fad3a0ba6acd2d913639bfcebff089d48556a2f91ee33404498227306\", \"dd0438b6f90ad1d9336a529a53aeee11b801f4f0ca77befd1c9a0673fa90ef08\", \"bd7d8007595e765cbe848f866b626f9b83f1a1a363b629edd2d7e201926b7905\", \"c07b916b8cc357bfad3932fa8eaebfc243c656db6eca68847f4258ddbb21a20f\", \"60e695ba8d0c4fe34f87e3185a987ea4cc21861b3e3630bcf2f05177529d530b\", \"8238b80b9d90e961482615a2b3ef6f8179d0e7bf88fc46e51da7cf3a109c0406\", \"15318d6027364091a89fc2d2326b6fef4207520f50e6e628cbb5a8999e6ef20b\", \"532f15150e88e15255b837877537491ab5865500c91af5262909ab1c8e363709\", \"0fe42c38685f4895420313a298a8c65f7318984f6cacf5b705d29615b99ee909\", \"88252dd5ab3cc419d1f0fe6f5a009a2ec40200d84e84b8e060d6fd057c46850f\"], \n        \"c1\": \"e1b36b2327ca88736f8b3a57e6ea455c1b42190a13991ea1c4aea0b776339706\", \n        \"D\": \"2a47003a81b17e8840dadf45c7dc185af458446dee2682c12283f678f025f233\"\n      }], \n    \"pseudoOuts\": [ \"3606665d2923b409315954289ff7c70e4c92957a21d9f20aef0638555b174919\", \"92f157a8aeca7fda1108c81d79e015ae464316cd94153ba8980c776b7558f542\"]\n  }\n}","weight":2220}],"credits":0,"top_hash":"","status":"OK","untrusted":false}';
        $response = GetTransactionPoolResponse::fromJsonString($jsonResponse);
        $responseFlat = json_encode(json_decode($jsonResponse));
        $this->assertSame($responseFlat, $response->toJson());
        $this->assertCount(2, $response->spentKeyImages);
        $this->assertSame('46c784f381bb6a1dfdd9d131f6e4692197f2a48b901b14b720ca6387956d8c58', $response->spentKeyImages[0]->idHash);
        $this->assertSame(['9be8f02bb10bfad7209ff976d9875df75b48a09440a81f2722ef25df78c6cd4b'], $response->spentKeyImages[0]->txsHashes);

        $this->assertCount(2, $response->transactions);
        $tx = $response->transactions[0];
        $this->assertSame(1525, $tx->blobSize);
        $this->assertFalse($tx->doNotRelay);
        $this->assertFalse($tx->doubleSpendSeen);
        $this->assertEquals(new Amount(160400000), $tx->fee);
        $this->assertSame('c4fb8ddd655ae074f55024f32494b82fd4f9258e78886b6b9e4572d45481ee12', $tx->idHash);
        $this->assertFalse($tx->keptByBlock);
        $this->assertSame(0, $tx->lastFailedHeight);
        $this->assertSame('0000000000000000000000000000000000000000000000000000000000000000', $tx->lastFailedIdHash);
        $this->assertSame(1697049076, $tx->lastRelayedTime);
        $this->assertSame(2993717, $tx->maxUsedBlockHeight);
        $this->assertSame('645680ac1816e39026039776f90476697ffc1c708cc8fb0f60ad5d17b9437d65', $tx->maxUsedBlockIdHash);
        $this->assertSame(1697049076, $tx->receiveTime);
        $this->assertTrue($tx->relayed);
        $this->assertSame(1525, $tx->weight);

        // transaction
        $this->assertSame(2, $tx->transaction->version);
        $this->assertSame(0, $tx->transaction->unlockTime);

        $this->assertInstanceOf(TransactionData::class, $response->transactions[0]->transaction);
    }

    public static function comparableJson(string $json): string
    {
        return json_encode(json_decode($json, flags: JSON_BIGINT_AS_STRING));
    }
}
