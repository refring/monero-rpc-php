<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Easily enable merge mining with Monero without requiring software that manually alters the extra field in the coinbase tx to include the merkle root of the aux blocks.Alias: *None*.
 */
class AddAuxPowRequest implements ParameterInterface
{
	use JsonSerialize;

	#[Json('blocktemplate_blob')]
	public string $blocktemplateBlob;

	/** @var AuxPow[] */
	#[Json('aux_pow')]
	public array $auxPow;


	public static function create(string $blocktemplateBlob, array $auxPow): RpcRequest
	{
		$self = new self();
		$self->blocktemplateBlob = $blocktemplateBlob;
		$self->auxPow = $auxPow;
		return new RpcRequest('add_aux_pow', $self);
	}
}
