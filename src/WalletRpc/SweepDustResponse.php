<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

/**
 * Send all dust outputs back to the wallet's, to make them easier to spend (and mix).
 */
class SweepDustResponse extends TransferSplitResponse
{
}
