<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc\Model;

enum QueryKeyType: string
{
    /**
     * the mnemonic seed (older wallets do not have one)
     */
    case MNEMONIC = 'mnemonic';

    case VIEW_KEY = 'view_key';

    case SPEND_KEY = 'spend_key';
}
