<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Sign a transaction in multisig.
 */
class SignMultisigResponse
{
    use JsonSerializeBigInt;

    /**
     * Multisig transaction in hex format.
     */
    #[Json('tx_data_hex')]
    public string $txDataHex;

    /**
     * @var string[] List of transaction Hash.
     */
    #[Json('tx_hash_list')]
    public array $txHashList = [];
}
