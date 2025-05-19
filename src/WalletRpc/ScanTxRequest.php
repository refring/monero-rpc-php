<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Given list of txids, scan each for outputs belonging to your wallet.
 * Note that the node will see these specific requests and may be a privacy concern.
 */
class ScanTxRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * @var string[] transaction ids
     */
    #[Json]
    public array $txids;


    /**
     * @param string[] $txids
     */
    public static function create(array $txids): RpcRequest
    {
        $self = new self();
        $self->txids = $txids;
        return new RpcRequest('scan_tx', $self);
    }
}
