<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\unit;

use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\Monero\Amount;
use RefRing\MoneroRpcPhp\Tests\unit\JsonSerializeBigInt\Classes\ClassWithBigInt;

class JsonSerializeBigIntTest extends TestCase
{
    public function testAmount()
    {
        $jsonResponse = '{"amountList":[1,2],"blabla":[5,6],"amount":1000000000000,"amount_custom_name":10}';
        $response = ClassWithBigInt::fromJsonString($jsonResponse);
        $response = new ClassWithBigInt();
        $response->amountList = [new Amount(1), new Amount(2)];
        $response->amountList2 = [new Amount(5), new Amount(6)];
        $response->amount = Amount::fromXmr('1');
        $response->amountCustomName = new Amount(10);
        //        $responseFlat = $this->comparableJson($jsonResponse);
        $this->assertSame($jsonResponse, $response->toJson());
    }

    public static function comparableJson(string $json): string
    {
        return json_encode(json_decode($json, flags: JSON_BIGINT_AS_STRING)->result);
    }
}
