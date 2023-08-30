<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Similar to [get_block_header_by_height](#get_block_header_by_height) above, but for a range of blocks. This method includes a starting block height and an ending block height as parameters to retrieve basic information about the range of blocks.Alias: *getblockheadersrange*.
 */
class GetBlockHeadersRangeRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * The starting block's height.
     */
    #[Json('start_height')]
    public int $startHeight;

    /**
     * The ending block's height.
     */
    #[Json('end_height')]
    public int $endHeight;

    /**
     * (Optional; defaults to `false`) Add PoW hash to block_header response.
     */
    #[Json('fill_pow_hash', omit_empty: true)]
    public ?bool $fillPowHash;


    public static function create(int $startHeight, int $endHeight, ?bool $fillPowHash = null): RpcRequest
    {
        $self = new self();
        $self->startHeight = $startHeight;
        $self->endHeight = $endHeight;
        $self->fillPowHash = $fillPowHash;
        return new RpcRequest('get_block_headers_range', $self);
    }
}
