<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\Address;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Performs extra multisig keys exchange rounds. Needed for arbitrary M/N multisig wallets
 */
class ExchangeMultisigKeysResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json]
    public Address $address;

    #[Json('multisig_info')]
    public string $multisigInfo;
}
