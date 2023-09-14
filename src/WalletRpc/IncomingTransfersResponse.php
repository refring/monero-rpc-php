<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\IncomingTransfer;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Return a list of incoming transfers to the wallet.
 */
class IncomingTransfersResponse
{
    use JsonSerialize;

    /** @var IncomingTransfer[] */
    #[Json(type: IncomingTransfer::class)]
    public array $transfers;
}
