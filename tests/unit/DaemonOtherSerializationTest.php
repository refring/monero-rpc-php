<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\unit;

use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\DaemonOther\GetHeightRequest;
use RefRing\MoneroRpcPhp\DaemonOther\GetNetStatsRequest;
use RefRing\MoneroRpcPhp\DaemonOther\GetNetStatsResponse;
use RefRing\MoneroRpcPhp\DaemonOther\PopBlocksRequest;

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
}
