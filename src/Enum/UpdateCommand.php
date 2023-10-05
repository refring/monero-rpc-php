<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Enum;

enum UpdateCommand: string
{
    case CHECK = 'check';
    case DOWNLOAD = 'download';
}
