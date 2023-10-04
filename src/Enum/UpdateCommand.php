<?php

namespace RefRing\MoneroRpcPhp\Enum;

enum UpdateCommand: string
{
    case CHECK = 'check';
    case DOWNLOAD = 'download';
}
