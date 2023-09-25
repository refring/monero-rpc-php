<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get a block template on which mining a new block.Alias: *getblocktemplate*.
 */
class GetBlockTemplateRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * Address of wallet to receive coinbase transactions if block is successfully mined.
     */
    #[Json('wallet_address')]
    public string $walletAddress;

    /**
     * Reserve size.
     */
    #[Json('reserve_size')]
    public int $reserveSize;

    public static function create(string $walletAddress, int $reserveSize): RpcRequest
    {
        $self = new self();
        $self->walletAddress = $walletAddress;
        $self->reserveSize = $reserveSize;
        return new RpcRequest('get_block_template', $self);
    }
}
