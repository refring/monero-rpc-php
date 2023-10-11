<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Submit a previously signed transaction on a read-only wallet (in cold-signing process).
 */
class SubmitTransferResponse
{
    use JsonSerializeBigInt;

    /**
     * @var string[] The tx hashes of every transaction.
     */
    #[Json('tx_hash_list')]
    public array $txHashList = [];
}
