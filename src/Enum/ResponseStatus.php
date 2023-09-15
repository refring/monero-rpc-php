<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Enum;

enum ResponseStatus: string
{
    case OK = 'OK';
    case BUSY = 'BUSY';
    case NOT_MINING = 'NOT MINING';
    case PAYMENT_REQUIRED = 'PAYMENT REQUIRED';
}
