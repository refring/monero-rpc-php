<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\JsonSerialize;

/**
 * Rescan the blockchain from scratch, losing any information which can not be recovered from the blockchain itself.This includes destination addresses, tx secret keys, tx notes, etc.Alias: *None*.
 */
class RescanBlockchainResponse
{
    use JsonSerialize;
}
