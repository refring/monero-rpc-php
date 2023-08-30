<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Returns the wallet's current block height.Alias: *getheight*.
 */
class GetHeightResponse
{
    use JsonSerialize;

    /**
     * The current monero-wallet-rpc's blockchain height. If the wallet has been offline for a long time, it may need to catch up with the daemon.
     */
    #[Json]
    public int $height;
}
