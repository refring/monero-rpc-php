<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Enum;

enum RpcClientType
{
    case WALLET;
    case DAEMON;
}
