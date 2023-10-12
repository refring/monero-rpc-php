<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\unit\JsonSerializeBigInt\Classes;

use RefRing\MoneroRpcPhp\Model\Amount;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;

class ClassWithBigInt
{
    use JsonSerializeBigInt;

    /** @var Amount[] */
    #[Json(type: Amount::class)]
    public array $amountList = [];

    /** @var Amount[] */
    #[Json('blabla', type: Amount::class)]
    public array $amountList2 = [];

    #[Json]
    public Amount $amount;

    #[Json('amount_custom_name')]
    public Amount $amountCustomName;
}
