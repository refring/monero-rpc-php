<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;
use RefRing\MoneroRpcPhp\Model\SubAddressAccountInformation;

/**
 * Get all accounts for a wallet. Optionally filter accounts by tag.Alias: *None*.
 */
class GetAccountsResponse
{
    use JsonSerialize;

    /**
     * @var SubAddressAccountInformation[] subaddress account information:
     */
    #[Json('subaddress_accounts', SubAddressAccountInformation::class)]
    public array $subaddressAccounts;

    /**
     * Total balance of the selected accounts (locked or unlocked).
     */
    #[Json('total_balance')]
    public int $totalBalance;

    /**
     * Total unlocked balance of the selected accounts.
     */
    #[Json('total_unlocked_balance')]
    public int $totalUnlockedBalance;
}
