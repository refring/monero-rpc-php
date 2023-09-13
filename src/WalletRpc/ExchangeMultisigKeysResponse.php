<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Address;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Performs extra multisig keys exchange rounds. Needed for arbitrary M/N multisig walletsAlias: *None*.
 */
class ExchangeMultisigKeysResponse
{
    use JsonSerialize;

    #[Json]
    public Address $address;

    #[Json('multisig_info')]
    public string $multisigInfo;
}
