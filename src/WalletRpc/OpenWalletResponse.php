<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\JsonSerialize;

/**
 * Open a wallet. You need to have set the argument "--wallet-dir" when launching monero-wallet-rpc to make this work.Alias: *None*.
 */
class OpenWalletResponse
{
    use JsonSerialize;
}
