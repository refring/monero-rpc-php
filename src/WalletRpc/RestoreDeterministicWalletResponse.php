<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Create and open a wallet on the RPC server from an existing mnemonic phrase and close the currently open wallet.Alias: *None*.
 */
class RestoreDeterministicWalletResponse
{
    use JsonSerialize;

    /**
     * 95-character hexadecimal address of the restored wallet as a string.
     */
    #[Json]
    public string $address;

    /**
     * Message describing the success or failure of the attempt to restore the wallet.
     */
    #[Json]
    public string $info;

    /**
     * Mnemonic phrase of the restored wallet, which is updated if the wallet was restored from a deprecated-style mnemonic phrase.
     */
    #[Json]
    public string $seed;

    /**
     * Indicates if the restored wallet was created from a deprecated-style mnemonic phrase.
     */
    #[Json('was_deprecated')]
    public bool $wasDeprecated;
}
