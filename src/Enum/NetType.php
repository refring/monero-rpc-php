<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Enum;

enum NetType: string
{
    case MAINNET = 'mainnet';
    case TESTNET = 'testnet';
    case STAGENET = 'stagenet';
}
