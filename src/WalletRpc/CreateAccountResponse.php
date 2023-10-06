<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Address;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Create a new account with an optional label.
 */
class CreateAccountResponse
{
    use JsonSerializeBigInt;

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
