<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Import multisig info from other participants.Alias: *None*.
 */
class ImportMultisigInfoRequest implements ParameterInterface
{
	use JsonSerialize;

	/**
	 * List of multisig info in hex format from other participants.
	 */
	#[Json]
	public array $info;


	public static function create(array $info): RpcRequest
	{
		$self = new self();
		$self->info = $info;
		return new RpcRequest('import_multisig_info', $self);
	}
}
