<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Transfer;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Return a list of incoming transfers to the wallet.
 */
class IncomingTransfersResponse
{
    use JsonSerialize;

    /** @var Transfer[] */
    #[Json]
    public array $transfers;

    /**
     * Several incoming transfers may share the same hash if they were in the same transaction.
     */
    #[Json('tx_hash')]
    public string $txHash;

    /**
     * has the output been frozen by `freeze`.
     */
    #[Json]
    public bool $frozen;

    /**
     * is the output spendable.
     */
    #[Json]
    public bool $unlocked;

    #[Json('block_height')]
    public int $blockHeight;

    /**
     * public key of our owned output.
     */
    #[Json]
    public string $pubkey;
}
