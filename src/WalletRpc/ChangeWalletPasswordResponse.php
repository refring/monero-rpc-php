<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\JsonSerialize;

/**
 * Change a wallet password.
 */
class ChangeWalletPasswordResponse
{
    use JsonSerialize;
}
