<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use RefRing\MoneroRpcPhp\WalletRpc\Model\AccountTagInformation;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Get a list of user-defined account tags.
 */
class GetAccountTagsResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /** @var AccountTagInformation[] */
    #[Json('account_tags', type:AccountTagInformation::class)]
    public array $accountTags = [];
}
