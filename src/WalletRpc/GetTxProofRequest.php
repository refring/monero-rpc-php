<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get transaction signature to prove it.Alias: *None*.
 */
class GetTxProofRequest implements ParameterInterface
{
	use JsonSerialize;

	/**
	 * transaction id.
	 */
	#[Json]
	public string $txid;

	/**
	 * destination public address of the transaction.
	 */
	#[Json]
	public string $address;

	/**
	 * (Optional) add a message to the signature to further authenticate the prooving process.
	 */
	#[Json(omit_empty: true)]
	public ?string $message;


	public static function create(string $txid, string $address, ?string $message = null): RpcRequest
	{
		$self = new self();
		$self->txid = $txid;
		$self->address = $address;
		$self->message = $message;
		return new RpcRequest('get_tx_proof', $self);
	}
}
