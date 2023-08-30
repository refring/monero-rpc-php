<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\AccountTagInformation;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get a list of user-defined account tags.Alias: *None*.
 */
class GetAccountTagsResponse
{
	use JsonSerialize;

	/** @var AccountTagInformation[] */
	#[Json('account_tags')]
	public array $accountTags;
}
