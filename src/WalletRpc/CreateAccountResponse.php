<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Address;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Create a new account with an optional label.Alias: *None*.
 */
class CreateAccountResponse
{
    use JsonSerialize;

    /**
     * Index of the new account.
     */
    #[Json('account_index')]
    public int $accountIndex;

    /**
     * Address for this account. Base58 representation of the public keys.
     */
    #[Json]
    public Address $address;
}
