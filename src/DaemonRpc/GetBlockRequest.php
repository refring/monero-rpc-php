<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Full block information can be retrieved by either block height or hash, like with the above block header calls. For full block information, both lookups use the same method, but with different input parameters.Alias: *getblock*.
 */
class GetBlockRequest implements ParameterInterface
{
	use JsonSerialize;

	/**
	 * The block's height.
	 */
	#[Json]
	public int $height;

	/**
	 * The block's hash.
	 */
	#[Json]
	public string $hash;

	/**
	 * (Optional; Default false) Add PoW hash to block_header response.
	 */
	#[Json('fill_pow_hash', omit_empty: true)]
	public ?bool $fillPowHash;


	public static function create(int $height, string $hash, ?bool $fillPowHash = null): RpcRequest
	{
		$self = new self();
		$self->height = $height;
		$self->hash = $hash;
		$self->fillPowHash = $fillPowHash;
		return new RpcRequest('get_block', $self);
	}
}
