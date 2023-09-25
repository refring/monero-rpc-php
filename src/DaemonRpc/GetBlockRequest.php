<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\BlockHash;
use RefRing\MoneroRpcPhp\Model\BlockHeight;
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
    #[Json(omit_empty: true)]
    public ?int $height;

    /**
     * The block's hash.
     */
    #[Json(omit_empty: true)]
    public ?string $hash;

    /**
     * (Optional; Default false) Add PoW hash to block_header response.
     */
    #[Json('fill_pow_hash', omit_empty: true)]
    public ?bool $fillPowHash;

    public static function create(BlockHash|BlockHeight $blockHashOrHeight, ?bool $fillPowHash = null): RpcRequest
    {
        $self = new self();
        if ($blockHashOrHeight instanceof BlockHeight) {
            $self->height = $blockHashOrHeight->value;
        } else {
            $self->hash = $blockHashOrHeight->value;
        }

        $self->fillPowHash = $fillPowHash;
        return new RpcRequest('get_block', $self);
    }
}
