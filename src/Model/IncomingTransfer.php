<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use RefRing\MoneroRpcPhp\WalletRpcClient;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class IncomingTransfer
{
    use JsonSerialize;

    /**
     * Amount of this transfer.
     */
    #[Json]
    public int $amount;

    /**
     * Mostly internal use, can be ignored by most users.
     */
    #[Json('global_index')]
    public int $globalIndex;

    /**
     * Key image for the incoming transfer's unspent output.
     */
    #[Json('key_image')]
    public string $keyImage;

    /**
     * Indicates if this transfer has been spent.
     */
    #[Json]
    public bool $spent;

    /**
     * JSON object containing the major & minor subaddress index:
     */
    #[Json('subaddr_index')]
    public SubAddressIndex $subaddrIndex;

    /**
     * Several incoming transfers may share the same hash if they were in the same transaction.
     */
    #[Json('tx_hash')]
    public string $txHash;

    /**
     * has the output been frozen by @see WalletRpcClient::freeze()
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
    #[Json('pubkey')]
    public string $publicKey;

    public function __construct(int $amount, int $globalIndex, string $keyImage, bool $spent, SubAddressIndex $subaddrIndex, string $txHash, bool $frozen, bool $unlocked, int $blockHeight, string $publicKey)
    {
        $this->amount = $amount;
        $this->globalIndex = $globalIndex;
        $this->keyImage = $keyImage;
        $this->spent = $spent;
        $this->subaddrIndex = $subaddrIndex;
        $this->txHash = $txHash;
        $this->frozen = $frozen;
        $this->unlocked = $unlocked;
        $this->blockHeight = $blockHeight;
        $this->publicKey = $publicKey;
    }
}
