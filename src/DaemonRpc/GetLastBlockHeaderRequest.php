<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Block header information for the most recent block is easily retrieved with this method. No inputs are needed.Alias: *getlastblockheader*.
 */
class GetLastBlockHeaderRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * (Optional; defaults to `false`) Add PoW hash to block_header response.
     */
    #[Json('fill_pow_hash', omit_empty: true)]
    public ?bool $fillPowHash;


    public static function create(?bool $fillPowHash = null): RpcRequest
    {
        $self = new self();
        $self->fillPowHash = $fillPowHash;
        return new RpcRequest('get_last_block_header', $self);
    }
}
