<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\unit;

use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\DaemonRpc\AddAuxPowResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\BannedResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\CalcPowResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\FlushCacheResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\FlushTxpoolResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GenerateblocksResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetAlternateChainsResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBansResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockCountResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockHeaderByHashResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockHeaderByHeightResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockHeadersRangeResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetBlockTemplateResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetCoinbaseTxSumResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetConnectionsResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetFeeEstimateResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetInfoResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetLastBlockHeaderBaseResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetMinerDataResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetOutputDistributionResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetOutputHistogramResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetTxpoolBacklogResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\GetVersionResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\HardForkInfoResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\OnGetBlockHashResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\PruneBlockchainResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\RelayTxResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\SetBansResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\SubmitBlockResponse;
use RefRing\MoneroRpcPhp\DaemonRpc\SyncInfoResponse;

class DaemonRpcDeserializationTest extends TestCase
{
    public function testGetBlockCount()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"count":1,"status":"OK","untrusted":false}}';
        $response = GetBlockCountResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testOnGetBlockHash()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":"e22cf75f39ae720e8b71b3d120a5ac03f0db50bba6379e2850975b4859190bc6"}';
        $response = OnGetBlockHashResponse::fromJsonString($jsonResponse, 'result');
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetBlockTemplate()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"blockhashing_blob":"0e0ed286da8006ecdc1aab3033cf1716c52f13f9d8ae0051615a2453643de94643b550d543becd00000000d130d22cf308b308498bbc16e2e955e7dbd691e6a8fab805f98ad82e6faa8bcc06","blocktemplate_blob":"0e0ed286da8006ecdc1aab3033cf1716c52f13f9d8ae0051615a2453643de94643b550d543becd0000000002abc78b0101ffefc68b0101fcfcf0d4b422025014bb4a1eade6622fd781cb1063381cad396efa69719b41aa28b4fce8c7ad4b5f019ce1dc670456b24a5e03c2d9058a2df10fec779e2579753b1847b74ee644f16b023c00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000051399a1bc46a846474f5b33db24eae173a26393b976054ee14f9feefe99925233802867097564c9db7a36af5bb5ed33ab46e63092bd8d32cef121608c3258edd55562812e21cc7e3ac73045745a72f7d74581d9a0849d6f30e8b2923171253e864f4e9ddea3acb5bc755f1c4a878130a70c26297540bc0b7a57affb6b35c1f03d8dbd54ece8457531f8cba15bb74516779c01193e212050423020e45aa2c15dcb","difficulty":226807339040,"difficulty_top64":0,"expected_reward":1182367759996,"height":2286447,"next_seed_hash":"","prev_hash":"ecdc1aab3033cf1716c52f13f9d8ae0051615a2453643de94643b550d543becd","reserved_offset":130,"seed_hash":"d432f499205150873b2572b5f033c9c6e4b7c6f3394bd2dd93822cd7085e7307","seed_height":2285568,"wide_difficulty":"0x34cec55820","status":"OK","untrusted":false}}';
        $response = GetBlockTemplateResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testSubmitBlock()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"status":"OK","untrusted":false}}';
        $response = SubmitBlockResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGenerateblocks()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"blocks":["49b712db7760e3728586f8434ee8bc8d7b3d410dac6bb6e98bf5845c83b917e4"],"height":9783,"status":"OK","untrusted":false}}';
        $response = GenerateblocksResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetLastBlockHeader()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"block_header":{"block_size":5500,"block_weight":5500,"cumulative_difficulty":86164894009456483,"cumulative_difficulty_top64":0,"depth":0,"difficulty":227026389695,"difficulty_top64":0,"hash":"a6ad87cf357a1aac1ee1d7cb0afa4c2e653b0b1ab7d5bf6af310333e43c59dd0","height":2286454,"long_term_weight":5500,"major_version":14,"miner_tx_hash":"a474f87de1645ff14c5e90c477b07f9bc86a22fb42909caa0705239298da96d0","minor_version":14,"nonce":249602367,"num_txes":3,"orphan_status":false,"pow_hash":"","prev_hash":"fa17fefe1d05da775a61a3dc33d9e199d12af167ef0ab37e52b51e8487b50f25","reward":1181337498013,"timestamp":1612088597,"wide_cumulative_difficulty":"0x1321e83bb8af763","wide_difficulty":"0x34dbd3cabf"},"credits":0,"top_hash":"","status":"OK","untrusted":false}}';
        $response = GetLastBlockHeaderBaseResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetBlockHeaderByHash()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"block_header":{"block_size":210,"block_weight":210,"cumulative_difficulty":754734824984346,"cumulative_difficulty_top64":0,"depth":1374113,"difficulty":815625611,"difficulty_top64":0,"hash":"e22cf75f39ae720e8b71b3d120a5ac03f0db50bba6379e2850975b4859190bc6","height":912345,"long_term_weight":210,"major_version":1,"miner_tx_hash":"c7da3965f25c19b8eb7dd8db48dcd4e7c885e2491db77e289f0609bf8e08ec30","minor_version":2,"nonce":1646,"num_txes":0,"orphan_status":false,"pow_hash":"","prev_hash":"b61c58b2e0be53fad5ef9d9731a55e8a81d972b8d90ed07c04fd37ca6403ff78","reward":7388968946286,"timestamp":1452793716,"wide_cumulative_difficulty":"0x2ae6d65248f1a","wide_difficulty":"0x309d758b"},"credits":0,"top_hash":"","status":"OK","untrusted":false}}';
        $response = GetBlockHeaderByHashResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetBlockHeaderByHeight()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"block_header":{"block_size":210,"block_weight":210,"cumulative_difficulty":754734824984346,"cumulative_difficulty_top64":0,"depth":1374118,"difficulty":815625611,"difficulty_top64":0,"hash":"e22cf75f39ae720e8b71b3d120a5ac03f0db50bba6379e2850975b4859190bc6","height":912345,"long_term_weight":210,"major_version":1,"miner_tx_hash":"c7da3965f25c19b8eb7dd8db48dcd4e7c885e2491db77e289f0609bf8e08ec30","minor_version":2,"nonce":1646,"num_txes":0,"orphan_status":false,"pow_hash":"","prev_hash":"b61c58b2e0be53fad5ef9d9731a55e8a81d972b8d90ed07c04fd37ca6403ff78","reward":7388968946286,"timestamp":1452793716,"wide_cumulative_difficulty":"0x2ae6d65248f1a","wide_difficulty":"0x309d758b"},"credits":0,"top_hash":"","status":"OK","untrusted":false}}';
        $response = GetBlockHeaderByHeightResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetBlockHeadersRange()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"headers":[{"block_size":301413,"block_weight":301413,"cumulative_difficulty":13185267971483472,"cumulative_difficulty_top64":0,"depth":740464,"difficulty":134636057921,"difficulty_top64":0,"hash":"86d1d20a40cefcf3dd410ff6967e0491613b77bf73ea8f1bf2e335cf9cf7d57a","height":1545999,"long_term_weight":301413,"major_version":6,"miner_tx_hash":"9909c6f8a5267f043c3b2b079fb4eacc49ef9c1dee1c028eeb1a259b95e6e1d9","minor_version":6,"nonce":3246403956,"num_txes":20,"orphan_status":false,"pow_hash":"","prev_hash":"0ef6e948f77b8f8806621003f5de24b1bcbea150bc0e376835aea099674a5db5","reward":5025593029981,"timestamp":1523002893,"wide_cumulative_difficulty":"0x2ed7ee6db56750","wide_difficulty":"0x1f58ef3541"},{"block_size":13322,"block_weight":13322,"cumulative_difficulty":13185402687569710,"cumulative_difficulty_top64":0,"depth":740463,"difficulty":134716086238,"difficulty_top64":0,"hash":"b408bf4cfcd7de13e7e370c84b8314c85b24f0ba4093ca1d6eeb30b35e34e91a","height":1546000,"long_term_weight":13322,"major_version":7,"miner_tx_hash":"7f749c7c64acb35ef427c7454c45e6688781fbead9bbf222cb12ad1a96a4e8f6","minor_version":7,"nonce":3737164176,"num_txes":1,"orphan_status":false,"pow_hash":"","prev_hash":"86d1d20a40cefcf3dd410ff6967e0491613b77bf73ea8f1bf2e335cf9cf7d57a","reward":4851952181070,"timestamp":1523002931,"wide_cumulative_difficulty":"0x2ed80dcb69bf2e","wide_difficulty":"0x1f5db457de"}],"credits":0,"top_hash":"","status":"OK","untrusted":false}}';
        $response = GetBlockHeadersRangeResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetBlock()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"blob":"1010c58bab9b06b27bdecfc6cd0a46172d136c08831cf67660377ba992332363228b1b722781e7807e07f502cef8a70101ff92f8a7010180e0a596bb1103d7cbf826b665d7a532c316982dc8dbc24f285cbc18bbcc27c7164cd9b3277a85d034019f629d8b36bd16a2bfce3ea80c31dc4d8762c67165aec21845494e32b7582fe00211000000297a787a000000000000000000000000","block_header":{"block_size":106,"block_weight":106,"cumulative_difficulty":236046001376524168,"cumulative_difficulty_top64":0,"depth":40,"difficulty":313732272488,"difficulty_top64":0,"hash":"43bd1f2b6556dcafa413d8372974af59e4e8f37dbf74dc6b2a9b7212d0577428","height":2751506,"long_term_weight":176470,"major_version":16,"miner_tx_hash":"e49b854c5f339d7410a77f2a137281d8042a0ffc7ef9ab24cd670b67139b24cd","minor_version":16,"nonce":4110909056,"num_txes":0,"orphan_status":false,"pow_hash":"","prev_hash":"b27bdecfc6cd0a46172d136c08831cf67660377ba992332363228b1b722781e7","reward":600000000000,"timestamp":1667941829,"wide_cumulative_difficulty":"0x3469a966eb2f788","wide_difficulty":"0x490be69168"},"json":"{\n  \"major_version\": 16, \n  \"minor_version\": 16, \n  \"timestamp\": 1667941829, \n  \"prev_id\": \"b27bdecfc6cd0a46172d136c08831cf67660377ba992332363228b1b722781e7\", \n  \"nonce\": 4110909056, \n  \"miner_tx\": {\n    \"version\": 2, \n    \"unlock_time\": 2751566, \n    \"vin\": [ {\n        \"gen\": {\n          \"height\": 2751506\n        }\n      }\n    ], \n    \"vout\": [ {\n        \"amount\": 600000000000, \n        \"target\": {\n          \"tagged_key\": {\n            \"key\": \"d7cbf826b665d7a532c316982dc8dbc24f285cbc18bbcc27c7164cd9b3277a85\", \n            \"view_tag\": \"d0\"\n          }\n        }\n      }\n    ], \n    \"extra\": [ 1, 159, 98, 157, 139, 54, 189, 22, 162, 191, 206, 62, 168, 12, 49, 220, 77, 135, 98, 198, 113, 101, 174, 194, 24, 69, 73, 78, 50, 183, 88, 47, 224, 2, 17, 0, 0, 0, 41, 122, 120, 122, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0\n    ], \n    \"rct_signatures\": {\n      \"type\": 0\n    }\n  }, \n  \"tx_hashes\": [ ]\n}","miner_tx_hash":"e49b854c5f339d7410a77f2a137281d8042a0ffc7ef9ab24cd670b67139b24cd","credits":0,"top_hash":"","status":"OK","untrusted":false}}';
        $response = GetBlockResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetConnections()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"connections":[{"address":"51.75.162.171:44741","address_type":1,"avg_download":0,"avg_upload":1,"connection_id":"4420a6fcf9c642daaae41400ccfc1fd7","current_download":0,"current_upload":1,"height":1,"host":"51.75.162.171","incoming":true,"ip":"51.75.162.171","live_time":9,"local_ip":false,"localhost":false,"peer_id":"ff561b6a65c2838c","port":"44741","pruning_seed":0,"recv_count":382,"recv_idle_time":8,"rpc_credits_per_hash":0,"rpc_port":0,"send_count":15434,"send_idle_time":8,"state":"normal","support_flags":1}],"status":"OK","untrusted":false}}';
        $response = GetConnectionsResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetInfo()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"adjusted_time":1612090533,"alt_blocks_count":2,"block_size_limit":600000,"block_size_median":300000,"block_weight_limit":600000,"block_weight_median":300000,"bootstrap_daemon_address":"","busy_syncing":false,"cumulative_difficulty":86168732847545368,"cumulative_difficulty_top64":0,"database_size":34329849856,"difficulty":225889137349,"difficulty_top64":0,"free_space":10795802624,"grey_peerlist_size":4999,"height":2286472,"height_without_bootstrap":2286472,"incoming_connections_count":85,"mainnet":true,"nettype":"mainnet","offline":false,"outgoing_connections_count":16,"rpc_connections_count":1,"stagenet":false,"start_time":1611915662,"synchronized":true,"target":120,"target_height":2286464,"testnet":false,"top_block_hash":"b92720d8315b96e32020d04e14a0c54cc13e057d4a5beb4501be490d306fdd8f","tx_count":11239803,"tx_pool_size":21,"update_available":false,"version":"0.17.1.9-release","was_bootstrap_ever_used":false,"white_peerlist_size":1000,"wide_cumulative_difficulty":"0x1322201881f9c18","wide_difficulty":"0x34980ab2c5","credits":0,"top_hash":"","status":"OK","untrusted":false}}';
        $response = GetInfoResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testHardForkInfo()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"earliest_height":2210720,"enabled":true,"state":2,"threshold":0,"version":14,"votes":10080,"voting":14,"window":10080,"credits":0,"top_hash":"","status":"OK","untrusted":false}}';
        $response = HardForkInfoResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testSetBans()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"status":"OK","untrusted":false}}';
        $response = SetBansResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetBans()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"bans":[{"host":"102.168.1.51","ip":855746662,"seconds":22},{"host":"192.168.1.50","ip":838969536,"seconds":28}],"status":"OK","untrusted":false}}';
        $response = GetBansResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testBanned()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"banned":true,"seconds":690413,"status":"OK"}}';
        $response = BannedResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testFlushTxpool()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"status":"OK"}}';
        $response = FlushTxpoolResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetOutputHistogram()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"histogram":[{"amount":20000000000,"total_instances":381477,"unlocked_instances":0,"recent_instances":0}],"credits":0,"top_hash":"","status":"OK","untrusted":false}}';
        $response = GetOutputHistogramResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetCoinbaseTxSum()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"emission_amount":9471836197320,"emission_amount_top64":0,"fee_amount":0,"fee_amount_top64":0,"wide_emission_amount":"0x89d556e91c8","wide_fee_amount":"0x0","credits":0,"top_hash":"","status":"OK","untrusted":false}}';
        $response = GetCoinbaseTxSumResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetVersion()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"release":true,"version":196620,"current_height":2974978,"hard_forks":[{"height":1,"hf_version":1},{"height":1009827,"hf_version":2},{"height":1141317,"hf_version":3},{"height":1220516,"hf_version":4},{"height":1288616,"hf_version":5},{"height":1400000,"hf_version":6},{"height":1546000,"hf_version":7},{"height":1685555,"hf_version":8},{"height":1686275,"hf_version":9},{"height":1788000,"hf_version":10},{"height":1788720,"hf_version":11},{"height":1978433,"hf_version":12},{"height":2210000,"hf_version":13},{"height":2210720,"hf_version":14},{"height":2688888,"hf_version":15},{"height":2689608,"hf_version":16}],"status":"OK","untrusted":false}}';
        $response = GetVersionResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetFeeEstimate()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"fee":7874,"fees":[20000,80000,320000,4000000],"quantization_mask":10000,"credits":0,"top_hash":"","status":"OK","untrusted":false}}';
        $response = GetFeeEstimateResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetAlternateChains()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"chains":[{"block_hash":"dd4998cfe92a959a5a0e4ed72432cf23d7dfc4179cbea871ee2a705d71fb5e25","block_hashes":["dd4998cfe92a959a5a0e4ed72432cf23d7dfc4179cbea871ee2a705d71fb5e25"],"difficulty":86227995333492079,"difficulty_top64":0,"height":2286736,"length":1,"main_chain_parent_block":"6da3d2dc86ccc9353d19fc6b05083125f4ca7d22540d938010462f197a3fe590","wide_difficulty":"0x13257e7a78bfd6f"}],"status":"OK","untrusted":false}}';
        $response = GetAlternateChainsResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testRelayTx()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"status":"OK"}}';
        $response = RelayTxResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testSyncInfo()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"height":2287210,"next_needed_pruning_seed":0,"overview":"[]","peers":[{"info":{"address":"51.79.49.41:44317","address_type":1,"avg_download":0,"avg_upload":1,"connection_id":"718a970773e844618f3b830aa5775a45","current_download":0,"current_upload":1,"height":1,"host":"51.79.49.41","incoming":true,"ip":"51.79.49.41","live_time":26,"local_ip":false,"localhost":false,"peer_id":"c1d50bcd29c89909","port":"44317","pruning_seed":0,"recv_count":468,"recv_idle_time":5,"rpc_credits_per_hash":0,"rpc_port":0,"send_count":35347,"send_idle_time":3,"state":"normal","support_flags":1}}],"target_height":2287203,"credits":0,"top_hash":"","status":"OK","untrusted":false}}';
        $response = SyncInfoResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetTxpoolBacklog()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"backlog":"...Binary...","status":"OK","untrusted":false}}';
        $response = GetTxpoolBacklogResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetOutputDistribution()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"distributions":[{"amount":2628780000,"base":0,"distribution":"","start_height":1462078}],"status":"OK"}}';
        $response = GetOutputDistributionResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetMinerData()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"already_generated_coins":100,"difficulty":"0x48afae42de","height":2731375,"major_version":16,"median_weight":300000,"prev_id":"78d50c5894d187c4946d54410990ca59a75017628174a9e8c7055fa4ca5c7c6d","seed_hash":"a6b869d50eca3a43ec26fe4c369859cf36ae37ce6ecb76457d31ffeb8a6ca8a6","tx_backlog":[{"fee":30700000,"id":"9868490d6bb9207fdd9cf17ca1f6c791b92ca97de0365855ea5c089f67c22208","weight":1535},{"fee":44280000,"id":"b6000b02bbec71e18ad704bcae09fb6e5ae86d897ced14a718753e76e86c0a0a","weight":2214}],"status":"OK","untrusted":false}}';
        $response = GetMinerDataResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testPruneBlockchain()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"pruned":true,"pruning_seed":387,"status":"OK","untrusted":false}}';
        $response = PruneBlockchainResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testCalcPow()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":"d0402d6834e26fb94a9ce38c6424d27d2069896a9b8b1ce685d79936bca6e0a8"}';
        $response = CalcPowResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testFlushCache()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"status":"OK","untrusted":false}}';
        $response = FlushCacheResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testAddAuxPow()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"blocktemplate_blob":" ... ","blockhashing_blob":"1010ee97e2a106e9f8ebe8887e5b609949ac8ea6143e560ed13552b110cb009b21f0cfca1eaccf00000000b2685c1283a646bc9020c758daa443be145b7370ce5a6efacb3e614117032e2c22","merkle_root":"7b35762de164b20885e15dbe656b1138db06bb402fa1796f5765a23933d8859a","merkle_tree_depth":0,"aux_pow":[{"id":"3200b4ea97c3b2081cd4190b58e49572b2319fed00d030ad51809dff06b5d8c8","hash":"7b35762de164b20885e15dbe656b1138db06bb402fa1796f5765a23933d8859a"}],"status":"OK","untrusted":false}}';
        $response = AddAuxPowResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($responseFlat, $response->toJson());
    }

    public static function comparableJson(string $json) : string
    {
        return json_encode(json_decode($json)->result);
    }
}
