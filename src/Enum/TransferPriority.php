<?php

namespace RefRing\MoneroRpcPhp\Enum;

enum TransferPriority: int
{
    case DEFAULT = 0;
    case UNIMPORTANT = 1;
    case NORMAL = 2;
    case ELEVATED = 3;
}
