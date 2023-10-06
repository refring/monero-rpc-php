<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Returns the wallet's current block height.
 */
class GetHeightResponse
{
    use JsonSerializeBigInt;

    /**
     * The current monero-wallet-rpc's blockchain height. If the wallet has been offline for a long time, it may need to catch up with the daemon.
     */
    #[Json]
    public int $height;
}
