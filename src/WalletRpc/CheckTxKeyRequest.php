<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Check a transaction in the blockchain with its secret key.Alias: *None*.
 */
class CheckTxKeyRequest implements ParameterInterface
{
	use JsonSerialize;

	/**
	 * transaction id.
	 */
	#[Json]
	public string $txid;

	/**
	 * transaction secret key.
	 */
	#[Json('tx_key')]
	public string $txKey;

	/**
	 * destination public address of the transaction.
	 */
	#[Json]
	public string $address;


	public static function create(string $txid, string $txKey, string $address): RpcRequest
	{
		$self = new self();
		$self->txid = $txid;
		$self->txKey = $txKey;
		$self->address = $address;
		return new RpcRequest('check_tx_key', $self);
	}
}
