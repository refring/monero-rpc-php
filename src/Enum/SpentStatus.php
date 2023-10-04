<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Enum;

enum SpentStatus: int
{
    case UNSPENT = 0;
    case SPENT_IN_CHAIN = 1;
    case SPENT_IN_POOL = 2;
}
