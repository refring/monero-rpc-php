<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Set description for an account tag.
 */
class SetAccountTagDescriptionResponse
{
    use JsonSerializeBigInt;
}
