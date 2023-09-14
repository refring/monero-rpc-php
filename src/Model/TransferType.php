<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

enum TransferType: string
{
    case INCOMING = 'in';
    case OUTGOING = 'out';
    case PENDING = 'pending';
    case POOL = 'pool';
}
