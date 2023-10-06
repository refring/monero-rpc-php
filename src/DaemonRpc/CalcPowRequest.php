<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Calculate PoW hash for a block candidate.
 */
class CalcPowRequest implements ParameterInterface
{
    use JsonSerializeBigInt;

    /**
     * The major version of the monero protocol at this block height.
     */
    #[Json('major_version')]
    public int $majorVersion;

    #[Json]
    public int $height;

    #[Json('block_blob')]
    public string $blockBlob;

    #[Json('seed_hash')]
    public string $seedHash;

    public static function create(int $majorVersion, int $height, string $blockBlob, string $seedHash): RpcRequest
    {
        $self = new self();
        $self->majorVersion = $majorVersion;
        $self->height = $height;
        $self->blockBlob = $blockBlob;
        $self->seedHash = $seedHash;
        return new RpcRequest('calc_pow', $self);
    }
}
