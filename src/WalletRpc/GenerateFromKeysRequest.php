<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Restores a wallet from a given wallet address, view key, and optional spend key.
 */
class GenerateFromKeysRequest implements ParameterInterface
{
	use JsonSerialize;

	/**
	 * (Optional, defaults to 0) The block height to restore the wallet from.
	 */
	#[Json('restore_height', omit_empty: true)]
	public ?int $restoreHeight;

	/**
	 * The wallet's file name on the RPC server.
	 */
	#[Json]
	public string $filename;

	/**
	 * The wallet's primary address.
	 */
	#[Json]
	public string $address;

	/**
	 * (Optional, omit to create a view-only wallet) The wallet's private spend key.
	 */
	#[Json(omit_empty: true)]
	public ?string $spendkey;

	/**
	 * The wallet's private view key.
	 */
	#[Json]
	public string $viewkey;

	/**
	 * The wallet's password.
	 */
	#[Json]
	public string $password;

	/**
	 * (Defaults to true) If true, save the current wallet before generating the new wallet.
	 */
	#[Json('autosave_current', omit_empty: true)]
	public ?bool $autosaveCurrent;


	public static function create(
		?int $restoreHeight = null,
		string $filename,
		string $address,
		?string $spendkey = null,
		string $viewkey,
		string $password,
		?bool $autosaveCurrent = true,
	): RpcRequest
	{
		$self = new self();
		$self->restoreHeight = $restoreHeight;
		$self->filename = $filename;
		$self->address = $address;
		$self->spendkey = $spendkey;
		$self->viewkey = $viewkey;
		$self->password = $password;
		$self->autosaveCurrent = $autosaveCurrent;
		return new RpcRequest('generate_from_keys', $self);
	}
}
