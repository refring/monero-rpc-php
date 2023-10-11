<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\AccountTagInformation;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Get a list of user-defined account tags.
 */
class GetAccountTagsResponse
{
    use JsonSerializeBigInt;

    /** @var AccountTagInformation[] */
    #[Json('account_tags', type:AccountTagInformation::class)]
    public array $accountTags = [];
}
