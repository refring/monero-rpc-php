<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class SubAddressInformation
{
    use JsonSerialize;

    #[Json('account_index')]
    public int $accountIndex;

    /**
     * Address at this index. Base58 representation of the public keys.
     */
    #[Json]
    public string $address;

    /**
     * Index of the subaddress under the account.
     */
    #[Json('address_index')]
    public int $addressIndex;

    /**
     * Balance for the subaddress (locked or unlocked).
     */
    #[Json]
    public int $balance;

    #[Json('blocks_to_unlock')]
    public int $blocksToUnlock;

    /**
     * Label for the subaddress.
     */
    #[Json]
    public string $label;

    /**
     * Number of unspent outputs available for the subaddress.
     */
    #[Json('num_unspent_outputs')]
    public int $numUnspentOutputs;

    #[Json('time_to_unlock')]
    public int $timeToUnlock;

    /**
     * Unlocked balance for the subaddress.
     */
    #[Json('unlocked_balance')]
    public int $unlockedBalance;

    public function __construct(
        int $accountIndex,
        int $addressIndex,
        string $address,
        int $balance,
        int $unlockedBalance,
        string $label,
        int $numUnspentOutputs,
        int $timeToUnlock,
        int $blocksToUnlock,
    ) {
        $this->accountIndex = $accountIndex;
        $this->addressIndex = $addressIndex;
        $this->address = $address;
        $this->balance = $balance;
        $this->unlockedBalance = $unlockedBalance;
        $this->label = $label;
        $this->numUnspentOutputs = $numUnspentOutputs;
        $this->timeToUnlock = $timeToUnlock;
        $this->blocksToUnlock = $blocksToUnlock;
    }
}
