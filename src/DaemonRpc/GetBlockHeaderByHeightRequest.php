<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Similar to [get_block_header_by_hash](#get_block_header_by_hash) above, this method includes a block's height as an input parameter to retrieve basic information about the block.Alias: *getblockheaderbyheight*.
 */
class GetBlockHeaderByHeightRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * The block's height.
     */
    #[Json]
    public int $height;

    /**
     * (Optional; defaults to `false`) Add PoW hash to block_header response.
     */
    #[Json('fill_pow_hash', omit_empty: true)]
    public ?bool $fillPowHash;

    public static function create(int $height, ?bool $fillPowHash = null): RpcRequest
    {
        $self = new self();
        $self->height = $height;
        $self->fillPowHash = $fillPowHash;
        return new RpcRequest('get_block_header_by_height', $self);
    }
}
