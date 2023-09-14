<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

enum IncomingTransferType: string
{
    /**
     * all the transfers
     */
    case ALL = 'all';

    /**
     * only transfers which are not yet spent
     */
    case AVAILABLE = 'available';

    /**
     * only transfers which are already spent
     */
    case UNAVAILABLE = 'unavailable';
}
