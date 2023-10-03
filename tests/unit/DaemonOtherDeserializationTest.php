<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\unit;

use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\DaemonOther\GetAltBlocksHashesResponse;
use RefRing\MoneroRpcPhp\DaemonOther\GetHeightResponse;
use RefRing\MoneroRpcPhp\DaemonOther\GetNetStatsResponse;
use RefRing\MoneroRpcPhp\DaemonOther\IsKeyImageSpentResponse;
use RefRing\MoneroRpcPhp\DaemonOther\PopBlocksResponse;
use RefRing\MoneroRpcPhp\DaemonOther\SendRawTransactionResponse;
use RefRing\MoneroRpcPhp\DaemonOther\StartMiningResponse;
use RefRing\MoneroRpcPhp\DaemonOther\StopMiningResponse;

class DaemonOtherDeserializationTest extends TestCase
{
    public function testGetHeight()
    {
        $jsonResponse = '{"hash":"7e23a28cfa6df925d5b63940baf60b83c0cbb65da95f49b19e7cf0ce7dd709ce","height":2287217,"status":"OK","untrusted":false}';
        $response = GetHeightResponse::fromJsonString($jsonResponse);
        $responseFlat = json_encode(json_decode($jsonResponse));
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testGetNetStats()
    {
        $jsonResponse = '{"start_time":1665147355,"total_packets_in":2130592,"total_bytes_in":3743474809,"total_packets_out":1010674,"total_bytes_out":5932012405,"status":"OK","untrusted":false}';
        $response = GetNetStatsResponse::fromJsonString($jsonResponse);
        $responseFlat = json_encode(json_decode($jsonResponse));
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testPopBlocks()
    {
        $jsonResponse = '{"height":76482,"status":"OK","untrusted":false}';
        $response = PopBlocksResponse::fromJsonString($jsonResponse);
        $responseFlat = json_encode(json_decode($jsonResponse));
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testSendRawTransaction()
    {
        $jsonResponse = '{"double_spend":false,"fee_too_low":false,"invalid_input":false,"invalid_output":false,"low_mixin":false,"not_relayed":false,"overspend":false,"reason":"","sanity_check_failed":false,"too_big":false,"too_few_outputs":false,"tx_extra_too_big":false,"credits":0,"top_hash":"","status":"OK","untrusted":false}';
        $response = SendRawTransactionResponse::fromJsonString($jsonResponse);
        $responseFlat = json_encode(json_decode($jsonResponse));
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testGetAltBlocksHashes()
    {
        $jsonResponse = '{"blks_hashes":["dd4998cfe92a959a5a0e4ed72432cf23d7dfc4179cbea871ee2a705d71fb5e25","f36c3856ffde6a7d06fc832c80ede4ad5b6c8f702c9736dae1e2140d86504db9","8d0c1f806817259d213c8829ea3356334e0d8fdd3b118e1243756e12dce767bb"],"credits":0,"top_hash":"","status":"OK","untrusted":false}';
        $response = GetAltBlocksHashesResponse::fromJsonString($jsonResponse);
        $responseFlat = json_encode(json_decode($jsonResponse));
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testIsKeyImageSpent()
    {
        $jsonResponse = '{"spent_status":[1,1],"credits":0,"top_hash":"","status":"OK","untrusted":false}';
        $response = IsKeyImageSpentResponse::fromJsonString($jsonResponse);
        $responseFlat = json_encode(json_decode($jsonResponse));
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testStartMining()
    {
        $jsonResponse = '{"status":"OK","untrusted":false}';
        $response = StartMiningResponse::fromJsonString($jsonResponse);
        $responseFlat = json_encode(json_decode($jsonResponse));
        $this->assertSame($responseFlat, $response->toJson());
    }

    public function testStopMining()
    {
        $jsonResponse = '{"status":"OK","untrusted":false}';
        $response = StopMiningResponse::fromJsonString($jsonResponse);
        $responseFlat = json_encode(json_decode($jsonResponse));
        $this->assertSame($responseFlat, $response->toJson());
    }
}
