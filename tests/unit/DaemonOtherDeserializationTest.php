<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\unit;

use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\DaemonOther\GetHeightResponse;
use RefRing\MoneroRpcPhp\DaemonOther\GetNetStatsRequest;
use RefRing\MoneroRpcPhp\DaemonOther\GetNetStatsResponse;
use RefRing\MoneroRpcPhp\DaemonOther\PopBlocksResponse;
use RefRing\MoneroRpcPhp\DaemonOther\SendRawTransactionResponse;

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
}
