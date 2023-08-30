<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Apply a filtering tag to a list of accounts.Alias: *None*.
 */
class TagAccountsRequest implements ParameterInterface
{
	use JsonSerialize;

	/**
	 * Tag for the accounts.
	 */
	#[Json]
	public string $tag;

	/**
	 * Tag this list of accounts.
	 */
	#[Json]
	public array $accounts;


	public static function create(string $tag, array $accounts): RpcRequest
	{
		$self = new self();
		$self->tag = $tag;
		$self->accounts = $accounts;
		return new RpcRequest('tag_accounts', $self);
	}
}
