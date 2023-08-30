<?php

namespace RefRing\MoneroRpcPhp\Tests\integration;

use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\Exception\AddressNotInWalletException;
use RefRing\MoneroRpcPhp\Model\QueryKeyType;

class IntegrationTest extends TestCase
{
    public function testQueryKey()
    {
        $httpClient = new \GuzzleHttp\Client();
        $client = new \RefRing\MoneroRpcPhp\WalletRpcClient($httpClient, 'http://127.0.0.1:18082/json_rpc');
        $this->assertSame('4b5299030c378545891a603d7e965a8b0b236bd5cd81484721591027e96f270a', $client->queryKey(QueryKeyType::VIEW_KEY)->key);
    }

    public function testGetAddressIndexException()
    {
        $httpClient = new \GuzzleHttp\Client();
        $client = new \RefRing\MoneroRpcPhp\WalletRpcClient($httpClient, 'http://127.0.0.1:18082/json_rpc');
        $this->expectException(AddressNotInWalletException::class);
        $client->getAddressIndex('7BnERTpvL5MbCLtj5n9No7J5oE5hHiB3tVCK5cjSvCsYWD2WRJLFuWeKTLiXo5QJqt2ZwUaLy2Vh1Ad51K7FNgqcHgjW85o');
    }
}
