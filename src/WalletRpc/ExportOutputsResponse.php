<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Export outputs in hex format.Alias: *None*.
 */
class ExportOutputsResponse
{
	use JsonSerialize;

	/**
	 * wallet outputs in hex format.
	 */
	#[Json('outputs_data_hex')]
	public string $outputsDataHex;
}
