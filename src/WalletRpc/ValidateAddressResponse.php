<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Analyzes a string to determine whether it is a valid monero wallet address and returns the result and the address specifications.
 */
class ValidateAddressResponse
{
    use JsonSerialize;

    /**
     * True if the given address is an [integrated address]({{ site.baseurl }}/resources/moneropedia/address.html).
     */
    #[Json]
    public bool $integrated;

    /**
     * Specifies which of the three Monero networks (mainnet, stagenet, and testnet) the address belongs to.
     */
    #[Json]
    public string $nettype;

    /**
     * Address which the [OpenAlias-formatted address]({{ site.baseurl }}/resources/moneropedia/openalias.html) points to, if given.
     */
    #[Json('openalias_address')]
    public string $openaliasAddress;

    /**
     * True if the given address is a [subaddress](https://github.com/monero-project/monero/pull/2056)
     */
    #[Json]
    public bool $subaddress;

    /**
     * True if the input address is a valid Monero address.
     */
    #[Json]
    public bool $valid;
}
