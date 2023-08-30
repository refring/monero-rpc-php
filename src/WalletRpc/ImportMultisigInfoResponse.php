<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Import multisig info from other participants.Alias: *None*.
 */
class ImportMultisigInfoResponse
{
	use JsonSerialize;

	/**
	 * Number of outputs signed with those multisig info.
	 */
	#[Json('n_outputs')]
	public int $nOutputs;
}
