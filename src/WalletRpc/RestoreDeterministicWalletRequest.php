<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Create and open a wallet on the RPC server from an existing mnemonic phrase and close the currently open wallet.
 */
class RestoreDeterministicWalletRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * Name of the wallet.
     */
    #[Json]
    public string $filename;

    /**
     * Password of the wallet.
     */
    #[Json]
    public string $password;

    /**
     * Mnemonic phrase of the wallet to restore.
     */
    #[Json]
    public string $seed;

    /**
     * (Optional) Block height to restore the wallet from (Defaults to 0).
     */
    #[Json('restore_height', omit_empty: true)]
    public ?int $restoreHeight;

    /**
     * (Optional) Language of the mnemonic phrase in case the old language is invalid.
     */
    #[Json(omit_empty: true)]
    public ?string $language;

    /**
     * (Optional) Offset used to derive a new seed from the given mnemonic to recover a secret wallet from the mnemonic phrase.
     */
    #[Json('seed_offset', omit_empty: true)]
    public ?string $seedOffset;

    /**
     * Whether to save the currently open RPC wallet before closing it (Defaults to true).
     */
    #[Json('autosave_current', omit_empty: true)]
    public ?bool $autosaveCurrent;

    public static function create(
        string $filename,
        string $password,
        string $seed,
        ?int $restoreHeight = 0,
        ?string $language = null,
        ?string $seedOffset = null,
        ?bool $autosaveCurrent = true,
    ): RpcRequest {
        $self = new self();
        $self->filename = $filename;
        $self->password = $password;
        $self->seed = $seed;
        $self->restoreHeight = $restoreHeight;
        $self->language = $language;
        $self->seedOffset = $seedOffset;
        $self->autosaveCurrent = $autosaveCurrent;
        return new RpcRequest('restore_deterministic_wallet', $self);
    }
}
