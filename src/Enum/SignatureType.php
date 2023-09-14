<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Enum;

enum SignatureType: string
{
    case SPEND = 'spend';
    case VIEW = 'view';
}
