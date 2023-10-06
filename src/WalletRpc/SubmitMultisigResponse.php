<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Submit a signed multisig transaction.
 */
class SubmitMultisigResponse
{
    use JsonSerializeBigInt;

    /**
     * @var string[] List of transaction Hash.
     */
    #[Json('tx_hash_list')]
    public array $txHashList;
}
