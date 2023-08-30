<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Block header information can be retrieved using either a block's hash or height. This method includes a block's hash as an input parameter to retrieve basic information about the block.Alias: *getblockheaderbyhash*.
 */
class GetBlockHeaderByHashRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * The block's sha256 hash.
     */
    #[Json]
    public string $hash;

    /**
     * (Optional; defaults to `false`) Add PoW hash to block_header response.
     */
    #[Json('fill_pow_hash', omit_empty: true)]
    public ?bool $fillPowHash;


    public static function create(string $hash, ?bool $fillPowHash = null): RpcRequest
    {
        $self = new self();
        $self->hash = $hash;
        $self->fillPowHash = $fillPowHash;
        return new RpcRequest('get_block_header_by_hash', $self);
    }
}
